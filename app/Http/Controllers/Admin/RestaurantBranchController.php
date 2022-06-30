<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantBranch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = RestaurantBranch::paginate(10);
        return view('admin.restaurants.branches.index')->with(['branches' => $branchs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.restaurants.branches.create')->with(['users' => $users]);
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
            'address' => 'required',
            'phone' => 'required'
        ],[
            'name.required' => 'Tên chi nhánh không được để trống!',
            'address.required' => 'Địa chỉ không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['address'] = $request['address'];
            $data['phone'] = $request['phone'];
            $data['user_id'] = $request['user_id'];
            RestaurantBranch::create($data);
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'Thêm mới thông tin chi nhánh thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm mới thông tin chi nhánh không thành công!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RestaurantBranch $restaurantBranch
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantBranch $restaurantBranch)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RestaurantBranch $restaurantBranch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $data['users'] = $users;
        $data['branch'] = RestaurantBranch::findOrFail($id);
        return view('admin.restaurants.branches.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantBranch $restaurantBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ],[
            'name.required' => 'Tên chi nhánh không được để trống!',
            'address.required' => 'Địa chỉ không được để trống!',
            'phone.required' => 'Số điện thoại không được để trống!',
        ]);
        DB::beginTransaction();
        try {
            $data = RestaurantBranch::findOrFail($id);
            $data->name = $request['name'];
            $data->address = $request['address'];
            $data->phone = $request['phone'];
            $data->user_id = $request['user_id'];
            $data->save;
            DB::commit();
            return redirect()->route('branches.index')->with(['success' => 'Chỉnh sửa thông tin chi nhánh thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Chỉnh sửa thông tin chi nhánh không thành công!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RestaurantBranch $restaurantBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $restaurant_branch = RestaurantBranch::destroy($id);
            DB::commit();
            return response()->json([
                'error' => false,
                'msg' => 'Xóa thông tin chi nhánh thành công!'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => true,
                'msg' => 'Xóa thông tin chi nhánh không thành công!'
            ]);
        }
    }
}
