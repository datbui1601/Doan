<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MenuItem;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function introduction()
    {
        $top_news = News::orderBy('id', 'desc')->limit(3)->get();
        return view('pages.introduction')->with(['top_news' => $top_news]);
    }

    public function topDiskMonth()
    {
        return view('pages.top-disk');
    }

    public function menu(Request $request)
    {
        $menu_items = MenuItem::orderBy('id', 'DESC')->paginate(12);
        if ($request->type) {
            $menu_items = MenuItem::where('category', $request->type)->orderBy('id', 'DESC')->paginate(12);
        }

        return view('pages.product')->with(['menu_items' => $menu_items]);
    }

    public function detail($id)
    {
        $menu_item = MenuItem::findOrFail($id);
        return view('pages.detail')->with(['menu_item' => $menu_item]);
    }

    public function news()
    {
        $news = News::paginate(20);
        return view('pages.news')->with(['news' => $news]);
    }

    public function profile()
    {
        return view('pages.information');
    }
public function bookingDetail(){
    $data['carts'] = [];
    $customer = auth()->user();
    if ($customer) {
        $data['carts'] = Booking::where('user_id', $customer->id)->get();
    }
    return view('pages.information')->with($data);
}
    public function index()
    {
        $data['news'] = News::orderBy('created_at', 'DESC')->where('status', true)->limit(3)->get();
        return view('welcome')->with($data);
    }
}
