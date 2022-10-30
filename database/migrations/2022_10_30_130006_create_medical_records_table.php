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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id('id_rekmed');
            $table->char('id_dokter', 5)->nullable();
            $table->foreign('id_dokter')->references('id_dokter')->on('doctors');
            $table->char('id_pasien', 5)->nullable();
            $table->foreign('id_pasien')->references('id_pasien')->on('patients');
            $table->char('id_poli', 5)->nullable();
            $table->foreign('id_poli')->references('id_poli')->on('polies');
            $table->integer('diastole');
            $table->integer('sistole');
            $table->string('alergi', 100);
            $table->integer('gula_darah');
            $table->text('diagnosis', 255);
            $table->text('terapi', 255);
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
        Schema::dropIfExists('medical_records');
    }
};
