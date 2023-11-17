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
        Schema::create('golongan_tpd', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('pangkat');
            $table->string('golongan');
            $table->string('grade');
            $table->string('tpd');
            $table->string('list_rank')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongan_tpd');
    }
};
