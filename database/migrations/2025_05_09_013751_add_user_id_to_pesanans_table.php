<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom user_id
            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan foreign key ke tabel users
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            // Menghapus kolom user_id jika migrasi dibatalkan
            $table->dropColumn('user_id');
        });
    }
}
