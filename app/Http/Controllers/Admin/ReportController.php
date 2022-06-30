<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function report()
    {
        $dateStart = \request()->dateFrom ? Carbon::parse(\request()->dateFrom)->format('Y-m-d') : Carbon::now()->subDays(30)->format('Y-m-d');
        $dateEnd = \request()->dateTo ? Carbon::parse(\request()->dateTo)->format('Y-m-d') : Carbon::now()->addDay()->format('Y-m-d');
        $date1 = [];
        $data = [];
        do {
            $date[] = $dateStart;
            $value = Booking::select(DB::raw('SUM(total_money) as revenue'))->whereDate('date', $dateStart)->first()->revenue ?? 0;
            Log::debug($value);
            $dateStart = Carbon::parse($dateStart)->addDay();
            $data[] = $value;
        } while ($dateStart->lt($dateEnd));
        $date2 = [];
        foreach ($date as $item) {
            $date2[] = Carbon::parse($item)->format('Y-m-d');
        }
        $result['data'] = $data;
        $result['date'] = $date2;
        return $result;
    }

}
