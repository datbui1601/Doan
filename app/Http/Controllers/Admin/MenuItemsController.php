<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_item = MenuItem::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.menu-items.index')->with(['menu_items' => $menu_item, 'id_menu' => 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menus = Menu::all();
        return view('admin.menu-items.create')->with(['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['price'] = str_replace('.','', $request['price'] ?? 0);
        $request['sale_price'] = str_replace('.','', $request['sale_price'] ?? 0);
        $this->validate($request, [
            'name' => 'required|unique:menu_items,name',
            'price' => 'required|numeric|min:0',
        ],[
            'name.required' => 'Tên món không được để trống!',
            'name.unique' => 'Tên món đã bị trùng!',
            'price.required' => 'Giá không được để trống!',
            'price.min' => 'Giá phải lớn hơn 0'
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['price'] = $request['price'];
            $data['sale_price'] = $request['sale_price'] ?? 0;
            $data['valid_from'] = Carbon::parse($request['valid_from']) ?? '';
            $data['valid_to'] = Carbon::parse($request['valid_to']) ?? '';
            $data['menu_id'] = $request['menu_id'];
            $data['category'] = $request['category'];
            $data['type'] = $request['type'];
            $avata = Storage::disk('public')->put('memu_item', $request->file('avata', 'public'));
            error_reporting($avata);
            $data['avata'] = $avata;
            $data['description'] = $request['description'];
            MenuItem::create($data);
            DB::commit();
            return redirect()->route('foods-drinks.index')->with(['success', 'Thêm mới món ăn thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error', 'Thêm mới món ăn không thành công!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::all();
        $menu_item = MenuItem::findOrFail($id);
        return view('admin.menu-items.edit')->with(['menu_item' => $menu_item, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:menu_items,name,'.$id,
            'price' => 'required|numeric|min:0',
        ],[
            'name.required' => 'Tên món không được để trống!',
            'name.unique' => 'Tên món đã bị trùng!',
            'price.required' => 'Giá không được để trống!',
            'price.min' => 'Giá phải lớn hơn 0!'
        ]);
        DB::beginTransaction();
        try {
            $data = MenuItem::findOrFail($id);
            if ($data['avata']) {
                Storage::delete($data['avata']);
            }
            $data['name'] = $request['name'];
            $data['price'] = $request['price'];
            $data['sale_price'] = $request['sale_price'] ?? 0;
            $data['valid_from'] = Carbon::parse($request['valid_from']) ?? '';
            $data['valid_to'] = Carbon::parse($request['valid_to']) ?? '';
            $data['menu_id'] = $request['menu_id'];
            $data['category'] = $request['category'];
            $data['type'] = $request['type'];
            if ($request['avata']) {
                $avata = Storage::disk('public')->put('memu_item', $request->file('avata', 'public'));
                error_reporting($avata);
                $data['avata'] = $avata;
            }
            $data['description'] = $request['description'];
            $data->save();
            DB::commit();
            return redirect()->route('foods-drinks.index')->with(['success', 'Chỉnh sửa món ăn thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error', 'Chỉnh sửa món ăn không thành công!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            MenuItem::destroy($id);
            return response()->json([
                'error' => false,
                'msg' => 'Xóa món ăn thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Xóa món ăn không thành công!'
            ]);
        }
    }
}
