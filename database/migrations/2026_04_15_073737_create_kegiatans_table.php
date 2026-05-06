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
    Schema::create('kegiatans', function (Blueprint $table) {
        $table->id();

        $table->string('judul');
        $table->date('tanggal');
        $table->string('lokasi');
        $table->text('deskripsi');

        
        $table->string('gambar')->nullable();
        $table->enum('status', ['aktif', 'selesai'])->default('aktif');

        $table->timestamps();
    });
}
};
