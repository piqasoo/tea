<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ord')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes(); 
        });
        Schema::create('review_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('review_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('locale')->index();
            $table->unique(['review_id', 'locale']);
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('review_translations');
    }
}
