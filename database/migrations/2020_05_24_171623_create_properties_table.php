<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('properties', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('categories');
            $table->text('tags')->nullable();
            $table->string('propertyType');
            $table->integer('NumRooms');
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('city');
            $table->text('features')->nullable();
            $table->string('videos')->nullable();
            $table->text('nearbyAmenities')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->default(0);
            $table->text('constructionStage')->nullable();
            $table->text('legal')->nullable();
            $table->integer('outdoorSquare')->nullable();
            $table->integer('indoorSquare');
            $table->integer('kitchenSquare')->nullable();
            $table->integer('baths')->nullable();
            $table->integer('beds');
            $table->integer('garages')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('floors')->nullable();
            $table->integer('completedIn')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
