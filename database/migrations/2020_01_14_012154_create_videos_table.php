<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->text('video');
            $table->date('date')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes(); 
        });
        Schema::create('video_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug');
            $table->text('text')->nullable();
            $table->string('locale')->index();
            $table->unique(['video_id', 'locale']);
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
        Schema::dropIfExists('video_translations');
    }
}
