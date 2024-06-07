<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesin_obat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mesin_id')->constrained()->onDelete('cascade'); // Foreign key to mesin table
            $table->foreignId('obat_id')->constrained()->onDelete('cascade'); // Foreign key to obat table
            $table->integer('repository'); 
            $table->integer('stok'); 
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
        Schema::dropIfExists('mesin_obat');
    }
}
