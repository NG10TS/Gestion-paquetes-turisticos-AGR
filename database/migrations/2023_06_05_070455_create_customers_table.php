<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('name');
            $table->string('last_name');
            $table->string('country');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phone');           
            $table->string('address');
            $table->string('nationality');
            $table->date('birthdate');
            $table->string('grades');
            $table->string('postal_code'); // New field for postal code
            $table->string('region_code'); // New field for region code
            $table->string('state');
            
            $table->unsignedBigInteger('customer_type_id');
            $table->unsignedBigInteger('booking_id');
            $table->timestamps();
            // Add other customer attributes as needed
            
            $table->foreign('customer_type_id')->references('id')->on('customer_types');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
