<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('name');
            $table->integer('stock');
            $table->double('price');
            $table->double('price_cut')->nullable();
            $table->double('discount')->nullable();
            $table->double('weight');
            $table->text('slug');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_draft')->default(true);
            $table->boolean('is_deal')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_top')->default(false);
            $table->boolean('is_special')->default(false);
            $table->boolean('is_foodies')->default(false);
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
        Schema::dropIfExists('products');
    }
}
