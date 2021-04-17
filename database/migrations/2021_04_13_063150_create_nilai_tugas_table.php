<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('id_tugas');
            // $table->foreign('id_tugas')->references('id')->on('tugas')->onUpdate('cascade')->onDelete('restrict');
            $table->string('file', 100)->nullable();
            $table->string('url',100)->nullable();
            $table->string('nilai');
            $table->date('pengumpulan')->nullable();
            $table->time('jamPengumpulan')->nullable();
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
        Schema::dropIfExists('nilai_tugas');
    }
}
