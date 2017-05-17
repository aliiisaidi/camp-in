<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adresse');
            $table->string('public_key');
            $table->string('nom');
            $table->string('commune');
            $table->string('categorie');
            $table->string('email');
            $table->string('site');
            $table->string('phone');
            $table->double('lat');
            $table->double('lng');
            $table->integer('classement');
            $table->string('code_postal');
            $table->integer('nbr');
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
        Schema::dropIfExists('campings');
    }
}
