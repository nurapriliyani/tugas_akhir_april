<?php
// Buat migration baru: php artisan make:migration add_wa_grup_to_kegiatans_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->string('wa_grup')->nullable()->after('gambar');
            // Link grup WA, contoh: https://chat.whatsapp.com/xxxxx
        });
    }
    public function down(): void {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropColumn('wa_grup');
        });
    }
};