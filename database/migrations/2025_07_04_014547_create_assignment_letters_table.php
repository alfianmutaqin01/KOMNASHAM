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
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->string('nomor_surat')->unique(); 
                $table->string('nama_komisioner'); 
                $table->string('jabatan_komisioner'); 
                $table->longText('tujuan_penugasan'); 
                $table->string('tempat_tugas'); 
                $table->date('tanggal_mulai_tugas');
                $table->date('tanggal_selesai_tugas');
                $table->year('tahun'); 
                $table->longText('perihal')->nullable(); 
                $table->longText('dasar_hukum')->nullable(); 
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('assignment_letters');
        }
    };
    