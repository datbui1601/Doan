<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\RestaurantBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('admin.menus.index')->with(['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $branches = RestaurantBranch::all();
        return view('admin.menus.create')->with(['branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ],[
            'name.required' => 'Tên menu không được để trống!',
            'type.required' => 'Loại menu không được để trống!'
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['type'] = $request['type'];
            $data['restaurant_branch_id'] = $request['restaurant_branch_id'];
            Menu::create($data);
            DB::commit();
            return redirect()->route('menu.show', $data['restaurant_branch_id'])->with('success', 'Thêm mới menu thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Thêm mơí menu không thành công!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $branches = RestaurantBranch::all();
        return view('admin.menus.edit')->with(['menu' => $menu, 'branches' => $branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ],[
            'name.required' => 'Tên menu không được để trống!',
            'type.required' => 'Loại menu không được để trống!'
        ]);
        DB::beginTransaction();
        try {
            $menu->name = $request->name;
            $menu->type = $request->type;
            $menu->restaurant_branch_id = $request->restaurant_branch_id;
            $menu->save();
            DB::commit();
            return redirect()->route('menu.index')->with(['success', 'Chỉnh sửa menu thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error', 'Chỉnh sửa menu không thành công!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Menu::destroy($id);
            DB::commit();
            return response()->json([
                'error' => false,
                'msg' => 'Xóa menu thành công!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => false,
                'msg' => 'Xóa menu không thành công!'
            ]);
        }
    }

    public function listBranch()
    {
        $branchs = RestaurantBranch::paginate(10);
        return view('admin.menus.list_branch')->with(['branches' => $branchs]);
    }
}
