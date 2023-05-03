<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->string('jenis_kelamin')->nullable();
            $table->string('NISN')->unique();
            $table->unsignedBigInteger('jurusan');
            $table->foreign('jurusan')->references('id')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('jurusan');
            $table->string('tempatlahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('wali')->nullable();
            $table->date('thn_masuk')->nullable();
            $table->date('thn_lulus')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('asalsekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
