<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('admin.menus.create')->with(['id' => $request['id']]);
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
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request['name'];
            $data['type'] = $request['type'];
            $data['restaurant_branch_id'] = $request['restaurant_branch_id'];
            Menu::create($data);
            DB::commit();
            return redirect()->route('menu.show', $data['restaurant_branch_id'])->with('success', 'Create menu success!');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Create menu faild!');
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
        $menus = Menu::where('restaurant_branch_id', $id)->paginate(10);
        return view('admin.menus.index')->with(['menus' => $menus, 'id_branch'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function listBranch()
    {
        $branchs = RestaurantBranch::paginate(10);
        return view('admin.menus.list-branches')->with(['branches' => $branchs]);
    }
}
