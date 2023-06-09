<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('itinerary');
            $table->integer('number_of_quoters');
            $table->integer('days');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('status')->default(true);
            
            // Add other package attributes as needed
            
            $table->unsignedBigInteger('package_type_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('entertainment_id');
            $table->unsignedBigInteger('room_type_id');
            // Add other package fields as needed

            $table->timestamps();

            $table->foreign('package_type_id')->references('id')->on('package_types')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('entertainment_id')->references('id')->on('entertainment')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
