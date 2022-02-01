<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeftdetailsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->string('buyer_city');
          $table->string('buyer_country');
          $table->string('buyer_zipcode');
          $table->string('buyer_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->string('buyer_city');
          $table->string('buyer_country');
          $table->string('buyer_zipcode');
          $table->string('buyer_phone');
        });
    }
}
