<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->string('kode_matakuliah', 20)->unique();
            $table->string('nama_matakuliah', 100);
            $table->integer('sks');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->dropUnique(['kode_matakuliah']);

            $table->dropColumn([
                'kode_matakuliah',
                'nama_matakuliah',
                'sks'
            ]);
        });
    }
};

