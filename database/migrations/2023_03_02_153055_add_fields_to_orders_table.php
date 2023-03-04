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
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained('users', 'user_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Service::class, 'service_id')->constrained('services', 'service_id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropColumns('orders', [
            //
        ]);
    }
};
