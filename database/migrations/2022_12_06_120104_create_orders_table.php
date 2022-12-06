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
            //$table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->date('order_date');
            $table->float('sub_total');
            $table->float('tax_percentage');
            $table->float('tax_amount');
            $table->float('order_total');
           // $table->foreign('customer_id')->references('id')->on('customers')
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
