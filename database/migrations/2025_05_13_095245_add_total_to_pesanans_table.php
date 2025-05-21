<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_total_to_pesanans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToPesanansTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'total' pada tabel 'pesanans'
        Schema::table('pesanans', function (Blueprint $table) {
            $table->decimal('total', 10, 2)->default(0);  // Tipe data DECIMAL dengan default 0
        });
    }

    public function down()
    {
        // Menghapus kolom 'total' jika migrasi di-rollback
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropColumn('total');
        });
    }
}
