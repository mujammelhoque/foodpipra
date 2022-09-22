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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique()->nullable();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('sublocation_id')->nullable();
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('txn_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('coupon')->nullable();
            $table->float('total')->nullable();
            $table->integer('ship_cost')->nullable();
            // $table->enum('payment_method',['bkash','bkash'])->nullable();
            // $table->enum('payment_status',['bkash','rocket'])->nullable();
            $table->string('position')->default('new');
          
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('SET NULL');
            $table->foreign('sublocation_id')->references('id')->on('locations')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('SET NULL');
      
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
};
