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
            $table->increments('id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->bigInteger('pro_price');
            $table->bigInteger('price_sales')->nullable();
            $table->integer('is_sales')->default(0);
            $table->string('pro_img')->unique();
            $table->text('description')->nullable();
            $table->string('xuat_xu');
            $table->string('bao_hanh');
            $table->string('tinh_trang');
            $table->integer('trang_thai')->default(1);
            $table->integer('brand_id')->unsigned();
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
