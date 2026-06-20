<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('daftar_poli', function (Blueprint $table) {
            // Kita gunakan try-catch atau pengecekan kolom agar aman
            if (Schema::hasColumn('daftar_poli', 'pasien_id') && !Schema::hasColumn('daftar_poli', 'id_pasien')) {
                $table->renameColumn('pasien_id', 'id_pasien');
            }
            if (Schema::hasColumn('daftar_poli', 'jadwal_periksa_id') && !Schema::hasColumn('daftar_poli', 'id_jadwal')) {
                $table->renameColumn('jadwal_periksa_id', 'id_jadwal');
            }
            if (!Schema::hasColumn('daftar_poli', 'status')) {
                $table->enum('status', ['menunggu', 'selesai'])->default('menunggu')->after('no_antrian');
            }

            // Hapus dokter_id jika ada, karena daftar_poli terhubung ke jadwal_periksa yang sudah punya dokter_id
            if (Schema::hasColumn('daftar_poli', 'dokter_id')) {
                $table->dropColumn('dokter_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_poli', function (Blueprint $table) {
            if (Schema::hasColumn('daftar_poli', 'id_pasien')) {
                $table->renameColumn('id_pasien', 'pasien_id');
            }
            if (Schema::hasColumn('daftar_poli', 'id_jadwal')) {
                $table->renameColumn('id_jadwal', 'jadwal_periksa_id');
            }
        });
    }
};
