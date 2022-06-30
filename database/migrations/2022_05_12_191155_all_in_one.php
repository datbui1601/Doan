<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllInOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_branchs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('phone', 14);
            $table->timestamps();
        });

        Schema::create('restaurant_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedInteger('restaurant_branch_id');
            $table->char('code', 5);
            $table->timestamps();
        });

        Schema::create('restaurant_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedInteger('restaurant_zone_id');
            $table->char('max_seat', 5);
            $table->timestamps();
        });

        Schema::create('restaurant_information', function (Blueprint $table) {
            $table->id();
            $table->string('field')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->unsignedInteger('news_category_id');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->unsignedInteger('restaurant_branch_id');
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('menu_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->decimal('sale_price', 20, 2)->nullable();
            $table->dateTime('valid_from')->nullable();
            $table->dateTime('valid_to')->nullable();
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->decimal('total_money', 20, 2)->nullable();
            $table->decimal('deposit_money', 20, 2)->nullable();
            $table->integer('total_people')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedInteger('table_id')->nullable();
            $table->timestamps();
        });

        Schema::create('booking_foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('booking_id')->nullable();
            $table->unsignedInteger('menu_item_id')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->decimal('total_price', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_foods');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('news');
        Schema::dropIfExists('restaurant_information');
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('restaurant_tables');
        Schema::dropIfExists('restaurant_branchs');
        Schema::dropIfExists('restaurant_zones');
    }
}
