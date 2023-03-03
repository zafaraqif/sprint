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
            $table->unsignedTinyInteger('order_id');
            $table->string('file_name');
            $table->unsignedSmallInteger('page_no');
            $table->unsignedTinyInteger('pages_per_sheet');
            $table->unsignedTinyInteger('print_color');
            $table->unsignedTinyInteger('print_method');
            $table->unsignedTinyInteger('paper_weight');
            $table->string('file_path');
            $table->unsignedDecimal('file_size');
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
