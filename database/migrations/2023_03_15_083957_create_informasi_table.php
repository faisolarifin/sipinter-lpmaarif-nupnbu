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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id('id_info');
            $table->enum('type', ['SK', 'Piagam', 'Berita', 'Pengumuman']);
            $table->string('headline', 255);
            $table->text('content');
            $table->timestamps();
        });
        Schema::create('informasi_file', function (Blueprint $table) {
            $table->id('id_file');
            $table->unsignedBigInteger('id_info');
            $table->string('fileupload', 255);
            $table->foreign('id_info')->references('id_info')->on('informasi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_file');
        Schema::dropIfExists('informasi');
    }
};
