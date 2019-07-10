<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('manufacture_id');
            $table->integer('user_id')->default(1);
            $table->longtext('product_description');
            $table->float('product_price');
            $table->string('product_image1');
            $table->string('product_image2');
            $table->string('product_image3');
            $table->string('product_size')->default("--");
            $table->string('product_color')->default("--");
            $table->string('product_condition');
            $table->integer('publication_status');
            $table->integer('rec_status');
            $table->integer('featured_status');
            $table->integer('availability');
            //$table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('category_id')
            ->references('category_id')->on('tbl_category')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')->on('tbl_users')
            ->onDelete('cascade');

            $table->foreign('manufacture_id')
            ->references('manufacture_id')->on('tbl_manufacture')
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
        Schema::dropIfExists('tbl_products');
    }
}
