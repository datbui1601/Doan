<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingFood;
use App\Models\MenuItem;
use App\Models\r;
use App\Models\RestaurantBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['restaurant_branches'] = RestaurantBranch::all();
        $data['foods'] = MenuItem::all();
        return view('bookings.form')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $data['user_id'] = auth()->user() ? auth()->user()->id : '';
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
            if ($request->deposit > 0) {
                session()->put('deposit', $request->deposit);
                return redirect()->route('booking.getDeposit', $booking->id);
            }
            return redirect()->route('home')->with('success', 'Đặt thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại!');
        }
    }

    public function deposit($id) {
        $booking = Booking::findOrFail($id);
        return view('bookings.deposit')->with('booking', $booking);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\r $r
     * @return \Illuminate\Http\Response
     */
    public function show(r $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\r $r
     * @return \Illuminate\Http\Response
     */
    public function edit(r $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\r $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, r $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\r $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(r $r)
    {
        //
    }
}
