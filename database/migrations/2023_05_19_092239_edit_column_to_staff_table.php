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
        Schema::table('staff', function (Blueprint $table) {
            $table->string('nupl')->nullable()->change();
            $table->string('nama')->nullable()->change();
            $table->string('no_kk')->nullable()->change();
            $table->string('no_nik')->nullable()->change();
            $table->string('tempat_lahir')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->string('umur')->nullable()->change();
            $table->string('pendidikan_terakhir')->nullable()->change();
            $table->string('lulusan')->nullable()->change();
            $table->string('tmt')->nullable()->change();
            $table->string('jabatan')->nullable()->change();
            $table->string('nama_istri')->nullable()->change();
            $table->string('nik_istri')->nullable()->change();
            $table->string('tempat_lahir_istri')->nullable()->change();
            $table->date('tanggal_lahir_istri')->nullable()->change();
            $table->string('pendidikan_istri')->nullable()->change();
            $table->string('pekerjaan_istri')->nullable()->change();
            $table->text('alamat_ktp')->nullable()->change();
            $table->text('alamat_domisili')->nullable()->change();
            $table->timestamp('tanggal_keluar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
};
