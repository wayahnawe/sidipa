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
        Schema::create('budget_dipa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tahun_anggaran');
            $table->string('kode_anggaran');
            $table->string('nama_anggaran');
            $table->decimal('budget_anggaran', 18, 0)->default(0);
            $table->string('sd_anggaran')->default(00);
            $table->string('cp_anggaran')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugdet_models');
    }
};
