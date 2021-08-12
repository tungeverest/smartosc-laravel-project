<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkListcateOnProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listcate', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')->on('category')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listcate', function (Blueprint $table) {
            $table->dropForeign('listcate_category_id_foreign');
            $table->dropForeign('listcate_product_id_foreign');
        });
    }
}
