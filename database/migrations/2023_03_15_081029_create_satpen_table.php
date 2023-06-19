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
        /**
         * Tabel Ketegori Satuan Pendidikan (A, B, C, D)
         */
        Schema::create('kategori_satpen', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->enum('nm_kategori', ['A', 'B', 'C', 'D']);
            $table->string('konotasi', 45);
            $table->string('keterangan', 255)->nullable();
            $table->timestamps();
        });
        /**
         * Tabel Jenjang Pendidikan (TK, RA, SD, SMP, dst.)
         */
        Schema::create('jenjang_pendidikan', function (Blueprint $table) {
            $table->id('id_jenjang');
            $table->string('nm_jenjang', 45);
            $table->string('keterangan', 255)->nullable();
            $table->timestamps();
        });
        /**
         * Tabel Provinsi
         */
        Schema::create('provinsi', function (Blueprint $table) {
            $table->id('id_prov');
            $table->string('kode_prov', 10);
            $table->string('kode_prov_kd', 45);
            $table->string('nm_prov', 100);
            $table->timestamps();
        });
        /**
         * Tabel Kabupaten
         */
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->id('id_kab');
            $table->unsignedBigInteger('id_prov');
            $table->string('kode_kab', 10);
            $table->string('kode_kab_kd', 45);
            $table->string('nama_kab', 255);
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
        /**
         * Tabel Satuan Pendidikan
         */
        Schema::create('satpen', function (Blueprint $table) {
            $table->id('id_satpen');
            /**
             * Foregein key
             */
            $table->unsignedBigInteger('id_user')->unique();
            $table->unsignedBigInteger('id_prov');
            $table->unsignedBigInteger('id_kab');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_jenjang');

            $table->string('npsn', 45)->unique();
            $table->string('no_registrasi', 45)->unique();
            $table->string('nm_satpen', 255);
            $table->string('yayasan', 255);
            $table->string('kepsek', 100);
            $table->string('telpon', 15);
            $table->string('fax', 15)->nullable();
            $table->string('email', 100);
            $table->year('thn_berdiri');
            $table->string('kecamatan', 255);
            $table->string('kelurahan', 255);
            $table->text('alamat');
            $table->string('aset_tanah', 45);
            $table->string('nm_pemilik', 100);
            $table->dateTime('tgl_registrasi');
            $table->enum('status', ['permohonan', 'revisi', 'setujui', 'proses dokumen', 'terima']);
//            $table->string('logo', 255);
            $table->foreign('id_user')->references('id_user')->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_kab')->references('id_kab')->on('kabupaten')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_satpen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_jenjang')->references('id_jenjang')->on('jenjang_pendidikan')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
        /**
         * Tabel Timeline Registrasi
         */
        Schema::create('timeline_reg', function (Blueprint $table) {
            $table->id('id_timeline');
            $table->unsignedBigInteger('id_satpen');
            $table->string('status_verifikasi', 45);
            $table->dateTime('tgl_status');
            $table->text('keterangan');
            $table->foreign('id_satpen')->references('id_satpen')->on('satpen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
        /**
         * Tabel File Upload
         */
        Schema::create('file_upload', function (Blueprint $table) {
            $table->id('id_file');
            $table->unsignedBigInteger('id_satpen');
            $table->string('file_piagam', 255);
            $table->string('file_sk', 255);
            $table->foreign('id_satpen')->references('id_satpen')->on('satpen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_upload');
        Schema::dropIfExists('timeline_reg');
        Schema::dropIfExists('satpen');
        Schema::dropIfExists('kabupaten');
        Schema::dropIfExists('provinsi');
        Schema::dropIfExists('jenjang_pendidikan');
        Schema::dropIfExists('kategori_satpen');
    }
};
