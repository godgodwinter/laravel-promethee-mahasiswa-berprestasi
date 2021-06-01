<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataprosesdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataprosesdetail', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable();
            $table->string('thseleksi_id')->nullable();
            $table->string('kriteriadetail_id')->nullable();
            $table->string('bobot_kd')->nullable();
            $table->string('kriteria_id')->nullable();
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
        Schema::dropIfExists('dataprosesdetails');
    }
}
