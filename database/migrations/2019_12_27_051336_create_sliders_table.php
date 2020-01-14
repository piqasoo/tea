<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->text('link')->nullable();
            $table->integer('ord')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes(); 
        });
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->string('title_01')->nullable();
            $table->string('title_02')->nullable();
            $table->string('locale')->index();
            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('slider_translations');
    }
}
