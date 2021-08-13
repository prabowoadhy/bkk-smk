<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaranPrakerinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran_prakerins', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prakerin');
            $table->integer('id_pelamar');
            $table->text('catatan_pelamar')->nullable();
            $table->text('catatan_perusahaan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('lamaran_prakerins');
    }
}
