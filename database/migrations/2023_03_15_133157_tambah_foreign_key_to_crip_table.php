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
        Schema::table('crip', function (Blueprint $table) {
            $table->unsignedInteger('id_kriteria')->change();
            $table->foreign('id_kriteria')
                ->references('id')
                ->on('kriteria')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crip', function (Blueprint $table) {
            //
        });
    }
};
