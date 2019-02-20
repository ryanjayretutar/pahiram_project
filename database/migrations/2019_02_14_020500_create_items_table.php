<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('product_name', 100);
            $table->double('product_price', 8, 2);
            $table->double('cost_per_day', 8, 2)->unsigned()->nullable();
            $table->double('cost_per_hour', 8, 2)->unsigned()->nullable();
            $table->double('discount', 8, 2)->unsigned()->nullable();
            $table->double('cdw', 8, 2)->unsigned()->nullable();
            $table->unsignedInteger('product_stock');
            $table->date('added_date');
            $table->enum('p_status', ['0', '1']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('items');
    }
}
