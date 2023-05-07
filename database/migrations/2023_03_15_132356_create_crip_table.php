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
        Schema::create('crip', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kriteria');
            $table->string('nama_crip');
            $table->integer('crip');
            $table->integer('nilai_crip');
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
        Schema::dropIfExists('crip');
    }
};
