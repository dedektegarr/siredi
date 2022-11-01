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
        Schema::create('nurses', function (Blueprint $table) {
            $table->char('id_perawat', 5)->primary();
            $table->unsignedBigInteger('id')->unique()->nullable();
            $table->foreign('id')->references('id')->on('users');
            $table->string('nama', 100);
            $table->string('email', 50)->unique();
            $table->string('no_hp', 15);
            $table->text('alamat', 255);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir', 50);
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
        Schema::dropIfExists('nurses');
    }
};
