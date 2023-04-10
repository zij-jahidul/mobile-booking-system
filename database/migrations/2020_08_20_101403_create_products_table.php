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
            $table->integer('category_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->longText('product_name')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_color')->nullable();
            $table->float('product_price')->nullable();
            $table->float('product_old_price')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->integer('alert_quantity')->nullable();
            $table->float('product_discount')->nullable();
            $table->float('product_weight')->nullable();
            $table->longText('product_video')->nullable();
            $table->longText('product_main_image')->nullable();
            $table->longText('product_short_description')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->string('product_one')->nullable();
            $table->string('product_two')->nullable();
            $table->string('product_three')->nullable();
            $table->string('product_four')->nullable();
            $table->string('product_five')->nullable();
            $table->string('product_six')->nullable();
            $table->longText('product_url');
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->enum('is_featured', ['No', 'Yes'])->nullable();
            $table->tinyInteger('status');
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
