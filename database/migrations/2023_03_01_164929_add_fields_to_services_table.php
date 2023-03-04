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
        Schema::table('services', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained('users', 'user_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Community::class, 'community_id')->constrained('communities', 'community_id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('service_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('start_pickup_time');
            $table->time('end_pickup_time');
            $table->unsignedTinyInteger('service_status')->nullable();
            $table->string('pickup_address');
            $table->unsignedSmallInteger('page_limit');
            $table->unsignedDecimal('price_bnw');
            $table->unsignedDecimal('price_color');
            $table->unsignedDecimal('charge_80gsm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('services', [
            //
        ]);
    }
};
