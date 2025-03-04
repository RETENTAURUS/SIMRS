<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPengajuansTable extends Migration
{
    public function up()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Menambahkan kolom status
        });
    }

    public function down()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status jika migrasi dibatalkan
        });
    }
}
