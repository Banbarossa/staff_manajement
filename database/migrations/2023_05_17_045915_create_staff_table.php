<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // nupl
    // nama
    // no_kk
    // no_nik
    // tempat_lahir
    // tanggal_lahir
    // umur
    // pendidikan_terakhir
    // lulusan
    // tmt
    // jabatan
    // nama_istri
    // nik_istri
    // tempat_Lahir_istri
    // tanggal_lahir_istri
    // pendidikan_istri
    // pekerjaan_istri
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('nupl');
            $table->string('nama');
            $table->string('no_kk');
            $table->string('no_nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('umur');
            $table->string('pendidikan_terakhir');
            $table->string('lulusan');
            $table->string('tmt');
            $table->string('jabatan');
            $table->string('nama_istri');
            $table->string('nik_istri');
            $table->string('tempat_lahir_istri');
            $table->date('tanggal_lahir_istri');
            $table->string('pendidikan_istri');
            $table->string('pekerjaan_istri');
            $table->boolean('status')->default(true);
            $table->text('alamat_ktp');
            $table->text('alamat_domisili');
            $table->timestamp('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
