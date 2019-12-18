<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_01')->nullable();
            $table->string('mail_02')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
            $table->softDeletes();            
        });

        Schema::create('contact_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('manager')->nullable();
            $table->string('description', 160)->nullable();
            $table->text('keywords')->nullable();
            $table->string('locale')->index();
            $table->unique(['contact_id', 'locale']);
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });

        DB::table('contacts')->insert([
            'id' => 1, 'mail_01' => null, 'mail_02' => null, 'facebook' => null, 'instagram' => null, 'twitter' => null, 'youtube' => null, 
        ]);
        DB::table('contact_translations')->insert([
            ['id' => 1, 'contact_id' => 1, 'manager' => null, 'locale' => 'ka'],
            ['id' => 2, 'contact_id' => 1, 'manager' => null, 'locale' => 'en'],
            ['id' => 3, 'contact_id' => 1, 'manager' => null, 'locale' => 'itl'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_translations');
    }
}
