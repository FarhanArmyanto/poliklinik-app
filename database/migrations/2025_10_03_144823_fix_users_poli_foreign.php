<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            // pastikan drop constraint lama (kalau ada)
            $table->dropForeign(['id_poli']);

            // ✅ ubah kolom agar bisa null dan tetap sesuai foreign key
            $table->unsignedBigInteger('id_poli')->nullable()->change();

            // buat ulang foreign key dengan onDelete set null (bukan cascade)
            $table->foreign('id_poli')
                  ->references('id')
                  ->on('poli')
                  ->onDelete('set null');
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_poli']);
        });
    }
};
