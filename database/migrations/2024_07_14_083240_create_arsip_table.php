<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('kategori');
            // $table->unsignedBigInteger('id_kategori'); // Foreign key untuk kategori
            $table->string('judul');
            $table->string('file_path')->default('');
            $table->dateTime('waktu_pengarsipan');
            $table->timestamps();

            // Definisi foreign key
            // $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip');
    }
};
