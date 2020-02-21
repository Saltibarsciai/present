<?php

use Faker\Factory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $id = Factory::create()->numberBetween(1, 500);
        Schema::create('campings', function (Blueprint $table) use ($id) {
            $table->bigIncrements('id');
            $table->string('country');
            $table->string('city');
            $table->string('name');
            $table->double('rating')->default(0);
            $table->integer('reviews')->default(0);
            $table->string("link");
            $table->string("image")->default("https://picsum.photos/id/$id/350/250");
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
