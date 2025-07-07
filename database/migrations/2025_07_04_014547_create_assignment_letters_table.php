<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignment_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Komisioner yang diberi tugas
            $table->string('nomor_surat')->unique(); // Nomor surat yang dihasilkan
            $table->string('nama_komisioner'); // Nama komisioner yang ditugaskan (bisa dari user_id, tapi disimpan untuk history)
            $table->string('jabatan_komisioner'); // Jabatan komisioner yang ditugaskan
            $table->longText('tujuan_penugasan'); // Tujuan penugasan
            $table->string('tempat_tugas'); // Lokasi penugasan
            $table->date('tanggal_mulai_tugas');
            $table->date('tanggal_selesai_tugas');
            $table->longText('perihal')->nullable(); // Perihal surat tugas
            $table->longText('dasar_hukum')->nullable(); // Dasar hukum penugasan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignment_letters');
    }
};