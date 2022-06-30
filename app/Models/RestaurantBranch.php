<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantBranch extends Model
{
    use HasFactory;

    protected $table = 'restaurant_branchs';
    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'restaurant_branch_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
