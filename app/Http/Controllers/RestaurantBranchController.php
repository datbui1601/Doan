<?php

namespace App\Http\Controllers;

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
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['address'] = $request['address'];
            $data['phone'] = $request['phone'];
            $data['user_id'] = $request['user_id'];
            RestaurantBranch::create($data);
            return redirect()->route('branches.index')->with(['success' => 'Create restaurants branches success!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Create restaurants branches faild!']);
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
        $data['branches'] = RestaurantBranch::findOrFail($id);
        return view('admin.restaurants.branches.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantBranch $restaurantBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantBranch $restaurantBranch)
    {
        //
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
            RestaurantBranch::findOrFail($id)->detele();
            return response()->json([
               'error' => false,
               'msg' => 'Delete restaurants branches success!'
            ]);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => true,
                'msg' => 'Delete restaurants branches faild!'
            ]);
        }
    }
}
