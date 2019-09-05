<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('template')->nullable();
            $table->string('description')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('product_type_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_type_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_type_id')->unsigned();
            $table->string('name');
            $table->integer('side_one_max');
            $table->integer('side_two_max');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_types');
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
        Schema::dropIfExists('product_type_variants');
        Schema::dropIfExists('product_types');
    }
}
