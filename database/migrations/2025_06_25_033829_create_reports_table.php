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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_sidak')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('instansi_dikunjungi')->nullable();
            $table->text('tim_pelaksana')->nullable();
            $table->string('jenis_layanan_diamati')->nullable();
            $table->integer('jumlah_wawancara_pengguna')->nullable();
            $table->integer('jumlah_wawancara_petugas')->nullable();

            // Aksesibilitas
            $table->boolean('aksesibilitas_difabel_tersedia')->default(false);
            $table->boolean('area_pelayanan_mudah_dijangkau')->default(false);
            $table->text('temuan_khusus_aksesibilitas')->nullable();

            // Non-Diskriminasi
            $table->boolean('tidak_ditemukan_diskriminasi')->default(false);
            $table->boolean('petugas_melayani_semua')->default(false);
            $table->text('temuan_khusus_non_diskriminasi')->nullable();

            // Transparansi & Informasi
            $table->boolean('informasi_layanan_jelas')->default(false);
            $table->boolean('biaya_prosedur_dapat_diakses')->default(false);
            $table->text('temuan_khusus_transparansi')->nullable();

            // Kualitas dan Kecepatan Pelayanan
            $table->boolean('layanan_sesuai_prosedur')->default(false);
            $table->boolean('waktu_tunggu_relatif_cepat')->default(false);
            $table->text('temuan_khusus_kualitas')->nullable();

            // Perlakuan terhadap Pengguna Layanan
            $table->boolean('petugas_bersikap_ramah')->default(false);
            $table->boolean('tidak_ditemukan_intimidasi')->default(false);
            $table->text('temuan_khusus_perlakuan')->nullable();

            // Mekanisme Pengaduan
            $table->boolean('tersedia_sarana_aduan')->default(false);
            $table->boolean('warga_mengetahui_cara_aduan')->default(false);
            $table->text('temuan_khusus_mekanisme_pengaduan')->nullable();

            $table->longText('analisis_umum')->nullable();

            // Rekomendasi
            $table->boolean('rekomendasi_papan_informasi')->default(false);
            $table->boolean('rekomendasi_kursi_roda')->default(false);
            $table->boolean('rekomendasi_pelatihan_petugas')->default(false);
            $table->boolean('rekomendasi_sistem_pengaduan')->default(false);

            $table->string('status')->default('draft'); // 'draft', 'submitted', 'verified'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};