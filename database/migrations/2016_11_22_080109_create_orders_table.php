<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('doctype');
            $table->string('status')->default('Available');
            $table->string('order_title');
            $table->string('order_level');
            $table->string('no_of_pages');
            $table->string('spacing');
            $table->string('discipline');
            $table->string('deadline');
            $table->string('client_price');
            $table->string('citation');
            $table->string('no_of_sources');
            $table->string('instructions');
            $table->integer('approved')->default('0');
            $table->integer('paid')->default('0');
            $table->integer('banned')->default('0');
            $table->integer('ext_rqst')->default('0');
            $table->integer('available')->default('0');
            $table->integer('assigned')->default('0');
            $table->integer('removed_order')->default('0');
            $table->integer('confirm')->default('0');
            $table->integer('same_client')->default('0');
            $table->integer('order_status')->default('0');
            $table->string('approvaldate')->default('0');
            $table->integer('auto_assign')->default('0');
            $table->integer('request_re_assign')->default('0');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
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
