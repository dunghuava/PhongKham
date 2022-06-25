<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('brand_id')->unsinged();
            $table->string('code',255)->nullable();
            $table->string('name',512)->nullable();
            $table->double('price')->default(0);
            $table->integer('amount')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0. Hide 1. Active');
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
        Schema::dropIfExists('product');
    }
}
