<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('vcat_id')->unsigned()->index();
            $table->string('vtour_path');
            $table->string('vtour_title');
            $table->string('vtour_description');
            $table->boolean('vtour_status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_tours');
    }
}
