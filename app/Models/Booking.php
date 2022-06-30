<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $guarded = [];

    const WAITING_STATUS = 0;
    const DONE_STATUS = 1;
    const FAIL_STATUS = 2;

    /**
     * @var array
     */
    public static $status = [
        "0" => '<span class="badge badge-warning">Mới</span>',
        "1" => '<span class="badge badge-primary">Đã chốt bàn</span>',
        "2" => '<span class="badge badge-danger">Đã hủy</span>',
        "3" => '<span class="badge badge-danger">Đã đặt cọc</span>',
        "4" => '<span class="badge badge-primary">Đã Thanh Toán</span>',
        "5" => '<span class="badge badge-danger">Đang Giao</span>',
        "6" => '<span class="badge badge-success">Đang được sử dụng</span>',
    ];

    public function branch()
    {
        return $this->belongsTo(RestaurantBranch::class, 'branch_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(BookingFood::class, 'booking_id', 'id');
    }

    public function table_booking_foods()
    {
        return $this->hasMany(BookingFood::class, 'booking_id', 'id')->where('type', 1);
    }
    public function booking_foods()
    {
        return $this->hasMany(BookingFood::class, 'booking_id', 'id')->where('type', 0);
    }
}
