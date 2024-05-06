<?php

use App\Constants\PaymentMethodType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('pickup_point_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('delivery')->default(false);
            $table->string('region_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('pickup_point_address')->nullable();
            $table->integer('real_sum');
            $table->integer('sum');
            $table->integer('delivery_price')->default(0);
            $table->integer('total');
            $table->integer('bulk_total');
            $table->tinyInteger('payment_method')->default(PaymentMethodType::CASH);
            $table->tinyInteger('paid_request')->default(0);
            $table->boolean('status')->default(0);
            $table->tinyInteger('process')->default(0);
            $table->boolean('paid')->default(0);
            $table->string('random_order_id')->nullable();
            $table->string('sign')->nullable();
            $table->string('order_id')->nullable();
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
}
