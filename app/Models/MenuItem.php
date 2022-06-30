<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';
    protected $guarded = [];

    public function menu()
    {
        $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
