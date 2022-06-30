<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingFood;
use App\Models\MenuItem;
use App\Models\RestaurantBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id', 'DESC')->where('type', 1)->paginate(10);
        return view('admin.bookings.index')->with(['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['restaurant_branches'] = RestaurantBranch::all();
        $data['foods'] = MenuItem::all();
        return view('admin.bookings.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'quantity' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'area' => 'required',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'quantity.required' => 'Số người không được để trống',
            'quantity.numeric' => 'Số người phải là kiểu số',
            'date.required' => 'Ngày không được để trống',
            'date.date' => 'Sai format ngày',
            'time.required' => 'Thời gian không được để trống',
            'area.required' => 'Vui lòng chọn khu vực bàn'
        ]);
        DB::beginTransaction();
        try {
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['branch_id'] = $request->branch_id;
            $data['total_people'] = $request->quantity;
            $data['date'] = $request->date;
            $data['time'] = $request->time;
            $data['note'] = $request->note;
            $data['type'] = 1;
            $data['status'] = 0;
            $data['area'] = $request->area;
            $booking = Booking::create($data);
            $foods = $request->foods ?? [];
            $booking_details = [];
            $subTotal = 0;
            foreach ($foods as $key => $food) {
                if (isset($food['food'])) {
                    $subTotal += $food['number'] * $food['price'];
                    $booking_details[] = [
                        'booking_id' => $booking->id,
                        'menu_item_id' => $key,
                        'qty' => $food['number'],
                        'price' => $food['price'],
                        'total_price' => $food['price'] * $food['number'],
                        'type' => 1,
                    ];
                }
            }
            BookingFood::insert($booking_details);
            $booking->total_money = $subTotal;
            $booking->save();
            DB::commit();
            return redirect()->back()->with('success', 'Đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit')->with(['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->status = $request->status;
            $booking->area = $request->area;
            $booking->save();
            return  redirect()->back()->with('success', 'Chỉnh sửa đặt món thành công!!');
        }
        catch (\Exception $e){
            return  redirect()->back()->with('error', 'Chỉnh sửa đạt món không thành công!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Booking::destroy($id);
            return response()->json([
                'error' => false,
                'msg' => 'Xóa đặt bàn thành công!!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Xóa đặt bàn không thành công!!'
            ]);
        }
    }
}
