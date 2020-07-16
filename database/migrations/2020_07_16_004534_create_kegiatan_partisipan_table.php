<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanPartisipanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_partisipan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('kegiatan_id')->index('kegiatan_id');
            $table->string('nama', 100);
            $table->integer('jk');
            $table->integer('alamat');
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan_partisipan');
    }
}
