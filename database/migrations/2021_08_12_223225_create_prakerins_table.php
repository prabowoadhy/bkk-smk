<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrakerinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prakerins', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_prakerin');
            $table->string('posisi');
            $table->string('bidang');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('penempatan');
            $table->text('deskripsi');
            $table->string('slug');
            $table->integer('perusahaan_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('prakerins');
    }
}
