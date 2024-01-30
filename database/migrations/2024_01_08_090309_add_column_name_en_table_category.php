<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNameEnTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('table_category', function ($table) {
            $table->string("name_en",255);
        });
    }

    /**
     * Reverse the migrations.
     *0
     * @return void
     */
    public function down()
    {
        //
    }
}
