<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('jenis');
            $table->text('dasar');
            $table->text('urgensi');
            $table->text('perubahan');
            $table->string('instalasi');
            $table->string('pemohon');
            $table->string('kepala_instalasi')->nullable();
            $table->string('kontak');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
};
