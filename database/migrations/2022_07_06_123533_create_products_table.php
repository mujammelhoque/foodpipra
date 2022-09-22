<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->text('photo');
            $table->float('stock')->default(1);
            $table->string('weight')->default(1);
            $table->string('height')->nullable();
            $table->string('size')->default('M')->nullable();
            $table->string('brand')->nullable();
            $table->string('condition')->nullable();
            // $table->string('status')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->float('price');
            $table->float('ori_price');
            $table->float('discount')->nullabale();
            // $table->boolean('is_featured')->deault('0');
            // $table->unsignedBigInteger('child_cat_id')->nullable();
            // $table->unsignedBigInteger('brand_id')->nullable();
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            // $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('SET NULL');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('SET NULL');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('SET NULL');

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
};
