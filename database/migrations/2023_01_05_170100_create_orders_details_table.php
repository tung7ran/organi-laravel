<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOrdersDetailsTable.
 */
class CreateOrdersDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_details', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('id_order')->nullable();
            $table->integer('id_product')->nullable();
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('total')->nullable();
            $table->softDeletes();
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
		Schema::drop('orders_details');
	}
}
