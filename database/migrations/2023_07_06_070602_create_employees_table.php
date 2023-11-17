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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('nip')->unique()->nullable();
            $table->uuid('pangkat');
            $table->string('jabatan')->nullable();
            $table->string('subdit')->nullable();
            $table->string('eselon')->nullable();
            $table->string('status')->nullable();
            $table->boolean('ispejabat')->default('false');
            $table->decimal('gapok', 18, 0)->nullable();
            $table->string('email')->unique();
            $table->string('tlahir')->nullable();
            $table->date('ttl')->nullable();
            $table->string('jkelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_kawin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->text('kodepos')->nullable();
            $table->text('notelp')->nullable();
            $table->text('telegram')->nullable();
            $table->text('keterangan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
