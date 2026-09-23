<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->longText('variation')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->decimal('tax', 20, 2)->default(0.00);
            $table->decimal('shipping_cost', 20, 2)->default(0.00);
            $table->integer('quantity')->nullable();
            $table->string('payment_status', 10)->default('unpaid');
            $table->string('delivery_status', 20)->default('pending');
            $table->string('shipping_type', 255)->nullable();
            $table->integer('pickup_point_id')->nullable();
            $table->string('product_referral_code', 255)->nullable();
            $table->decimal('earn_point', 25, 2)->default(0.00);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
