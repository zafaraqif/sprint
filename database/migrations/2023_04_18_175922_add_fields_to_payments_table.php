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
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Order::class, 'order_id')->constrained('orders', 'order_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedTinyInteger('payment_type');
            $table->unsignedDecimal('payment_amount')->nullable();
            $table->unsignedDecimal('remaining_payment')->nullable();
            $table->string('session_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
};
