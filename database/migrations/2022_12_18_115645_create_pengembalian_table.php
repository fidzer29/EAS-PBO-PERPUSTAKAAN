<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id("Kode_Pinjam", 11);
            $table->string("Kode_Member", 11)->foreign("Kode_Member")->references("Kode_Member")->on("Member");
            $table->string("Kode_Buku", 11)->foreign("Kode_Buku")->references("Kode_Buku")->on("buku");
            $table->date("Tanggal_Pinjam")->default(now());
            $table->date("Tanggal_Kembali");
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
        Schema::dropIfExists('pengembalian');
    }
}
