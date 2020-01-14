<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('address_link')->nullable();
            $table->text('ticket')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();            
        });
        Schema::create('events_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned();
            $table->string('place');
            $table->string('name');
            $table->string('slug');
            $table->string('role')->nullable();
            $table->text('text')->nullable();
            $table->string('locale')->index();
            $table->unique(['events_id', 'locale']);
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_translations');
    }
}
