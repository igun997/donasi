<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->double('total');
            $table->integer('jenis');
            $table->integer('status');
            $table->string('bukti', 100)->nullable();
            $table->integer('kegiatan_id')->nullable()->index('kegiatan_id');
            $table->integer('user_id')->index('user_id');
            $table->text('keterangan');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
