<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoAlbumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_albums', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->date('date')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes(); 
        });
        Schema::create('photo_album_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_album_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug');
            $table->text('text')->nullable();
            $table->string('locale')->index();
            $table->unique(['photo_album_id', 'locale']);
            $table->foreign('photo_album_id')->references('id')->on('photo_albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_albums');
        Schema::dropIfExists('photo_album_translations');
    }
}
