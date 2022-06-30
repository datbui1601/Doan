<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantInformation;
use Illuminate\Http\Request;

class RestaurantInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = RestaurantInformation::all();
        return view('admin.restaurants.information')->with(['info' => $info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            foreach (\request()->value as $key => $data) {
                $restaurant = RestaurantInformation::find($key+=1);
                $restaurant->value = $data;
                $restaurant->save();
            }
            return redirect()->back()->with(['success' => 'Chỉnh sửa thông tin nhà hàng thành công!']);
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => 'Chỉnh sửa thông tin nhà hàng không thành công!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RestaurantInformation $restaurantInformation
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantInformation $restaurantInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RestaurantInformation $restaurantInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantInformation $restaurantInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RestaurantInformation $restaurantInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantInformation $restaurantInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RestaurantInformation $restaurantInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantInformation $restaurantInformation)
    {
        //
    }
}
