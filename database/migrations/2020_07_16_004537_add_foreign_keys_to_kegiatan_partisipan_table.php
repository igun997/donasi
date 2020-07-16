<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKegiatanPartisipanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kegiatan_partisipan', function (Blueprint $table) {
            $table->foreign('kegiatan_id', 'kegiatan_partisipan_ibfk_1')->references('id')->on('kegiatan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatan_partisipan', function (Blueprint $table) {
            $table->dropForeign('kegiatan_partisipan_ibfk_1');
        });
    }
}
