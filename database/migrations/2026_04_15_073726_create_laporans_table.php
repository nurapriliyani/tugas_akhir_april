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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('jenis_kasus');
            $table->string('kategori')->nullable();
            $table->date('tanggal_kejadian')->nullable();
            $table->string('lokasi')->nullable();

            $table->text('kronologi');

            $table->string('bukti')->nullable();
            $table->string('no_hp')->nullable();

            $table->boolean('anonim')->default(false);

            // REVISI: Menambahkan 'ditolak' ke dalam daftar enum
            $table->enum('status', ['menunggu', 'diproses', 'selesai', 'ditolak'])
                  ->default('menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};