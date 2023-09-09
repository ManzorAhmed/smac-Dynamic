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
            $table->string('image');
            $table->string('name');
            $table->text("description");
            $table->text('Paragraph');
            $table->float('price');
            $table->float('original_price');
            $table->float('discount')->default(0.0);
            $table->float('p_save');
            $table->char('sku');
            $table->enum('availability', ['in_stock', 'out_of_stock']);
            $table->enum('color', ['blue', 'white', 'black']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->integer('qty');
            $table->tinyInteger('active')->default(1);
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
