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
        Schema::create('sbu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('lokasi');
            $table->decimal('uang_harian', 18, 0)->nullable();
            $table->decimal('uang_harian_1', 18, 0)->nullable();
            $table->decimal('uang_harian_2', 18, 0)->nullable();
            $table->decimal('uang_harian_3', 18, 0)->nullable();
            $table->decimal('uang_harian_4', 18, 0)->nullable();
            $table->decimal('uang_saku', 18, 0)->nullable();
            $table->decimal('bintang_1', 18, 0)->nullable();
            $table->decimal('bintang_2', 18, 0)->nullable();
            $table->decimal('bintang_3', 18, 0)->nullable();
            $table->decimal('bintang_4', 18, 0)->nullable();
            $table->decimal('bintang_5', 18, 0)->nullable();
            $table->decimal('taxi', 18, 0)->nullable();
            $table->string('mata_uang')->default('IDR');
            $table->decimal('kurs', 18, 0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sbu');
    }
};
