<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_seller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->enum('category',['Fulltime','Freelancer']);
            $table->string('email');
            $table->string('no_telpon');
            $table->string('alamat');
            $table->enum('aktif',['Ya','Tidak']);
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
        Schema::dropIfExists('tb_seller');
    }
}
