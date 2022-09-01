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

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 19, 4)->default(0);
            $table->decimal('discountPercentage', 4, 2)->default(0);
            $table->decimal('rating', 4, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->string('brand',100);
            $table->string('category',100);
            $table->integer('category_id');
            $table->text('thumbnail');
            $table->json('images');
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
