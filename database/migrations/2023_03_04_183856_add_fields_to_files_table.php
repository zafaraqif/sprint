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
        Schema::table('files', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Order::class, 'order_id')->constrained('orders', 'order_id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedSmallInteger('page_number');
            $table->unsignedTinyInteger('pages_per_sheet');
            $table->unsignedSmallInteger('pages_to_print');
            $table->unsignedSmallInteger('sheets_to_print');
            $table->unsignedTinyInteger('orientation');
            $table->unsignedTinyInteger('print_color');
            $table->unsignedTinyInteger('print_method');
            $table->unsignedTinyInteger('paper_weight');
            $table->string('file_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
