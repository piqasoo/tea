<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();            
        });

        Schema::create('about_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('about_id')->unsigned();
            $table->string('title');
            $table->text('text');
            $table->string('description', 160)->nullable();
            $table->text('keywords')->nullable();
            $table->string('locale')->index();
            $table->unique(['about_id', 'locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
        });

        DB::table('abouts')->insert([
            'id' => 1, 'image' => null
        ]);
        DB::table('about_translations')->insert([
            ['id' => 1, 'about_id' => 1, 'title' => '', 'text' => '', 'locale' => 'ka'],
            ['id' => 2, 'about_id' => 1, 'title' => '', 'text' => '', 'locale' => 'en'],
            ['id' => 3, 'about_id' => 1, 'title' => '', 'text' => '', 'locale' => 'itl'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
        Schema::dropIfExists('about_translations');
    }
}
