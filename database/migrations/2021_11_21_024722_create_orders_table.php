<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('total');
            $table->double('delivery_fees');
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->text('buyer_address');
            $table->string('buyer_city');
            $table->string('buyer_country');
            $table->string('buyer_zipcode');
            $table->string('buyer_phone');
            $table->string('status')->default('pending');
            $table->boolean('is_paid')->default(false);
            $table->string('payment_method')->default('Zimbodelights');
            $table->string('delivery_method');
            $table->text('date_delivered')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
