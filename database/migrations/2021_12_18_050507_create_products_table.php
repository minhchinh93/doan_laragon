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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('type_products')->onDelete('cascade');
            $table->longText('description');
            $table->float('Unit_price');
            $table->float('promotion_price');
            $table->string('image');
            $table->string('unit');
            $table->string('new');
            $table->timestamps();
            $table->softDeletes(); // add

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
