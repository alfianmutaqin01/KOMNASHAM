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
        Schema::create('activity_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jabatan_komisioner')->nullable(); 
            $table->string('nama_kegiatan');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->string('lokasi_kegiatan');
            $table->text('tujuan_kegiatan');
            $table->text('pihak_terlibat')->nullable();
            $table->longText('deskripsi_singkat');
            $table->longText('hasil_kegiatan');
            $table->longText('tindak_lanjut')->nullable();
            $table->longText('permasalahan_tantangan')->nullable();
            $table->json('lampiran')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_reports');
    }
};