<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cart;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class CartController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function getTotal()
    {
        return count(session()->get('cart'));;
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart');
        $temp = new \stdClass();
        $product = MenuItem::find($request->id);

        if ($cart == null) {
            $temp->qty = $request->qty;
            $temp->price = $product->price;
            $temp->name = $product->name;
            $cart[$product->id] = $temp;
            session()->put('cart', $cart);
            return response()->json(['error' => false]);
        }
        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]->qty += $request->qty;
            session()->put('cart', $cart);
            return response()->json(['error' => false]);
        }
        $temp->qty = $request->qty;
        $temp->price = $product->price;
        $temp->name = $product->name;
        $cart[$product->id] = $temp;
        session()->put('cart', $cart);
        return response()->json(['error' => false]);
    }

    function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        $product = MenuItem::find($request->id);
        $total = 0;
        if ($request->action === 'update') {
            $cart[$product->id]->qty = $request->qty;
            foreach ($cart as $val) {
                $total += $val->qty * $val->price;
            }
            session()->put('cart', $cart);
            return response()->json([
                'price' => number_format($request->qty * $product->price, 0, '', '.'),
                'total' => number_format($total, 0, '', '.')
            ]);
        }
        unset($cart[$product->id]);
        foreach ($cart as $val) {
            $total += $val->qty * $val->price;
        }
        session()->put('cart', $cart);
        return response()->json([
            'total' => number_format($total, 0, '', '.')
        ]);
    }

}
