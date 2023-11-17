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
        Schema::create('spb', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nomor')->unique();
            $table->text('dasarpelaksanaan');
            $table->uuid('tujuan');
            $table->string('transportasi');
            $table->date('tglberangkat');
            $table->date('tglkembali');
            $table->uuid('kpa_id');
            $table->uuid('kasubdit_id');
            $table->uuid('mak');
            $table->date('tglttd');
            $table->date('tglkuitansi');
            $table->string('isnominatif')->default(false);
            $table->string('issptjb')->default(false);
            $table->string('isposted')->default(false);
            $table->text('keterangan');
            $table->string('mata_uang')->default("IDR");
            $table->decimal('kurs', 18, 0)->default(0);
            $table->string('status')->default("open");
            $table->string('type_perjalanan');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinas_models');
    }
};
