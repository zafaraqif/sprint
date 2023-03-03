<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedTinyInteger('user_id');
            $table->unsignedTinyInteger('service_id');
            $table->date('order_pickup_date');
            $table->time('order_pickup_time');
            $table->unsignedDecimal('total_price');
            $table->unsignedTinyInteger('order_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('files', [
            //
        ]);
    }
};
