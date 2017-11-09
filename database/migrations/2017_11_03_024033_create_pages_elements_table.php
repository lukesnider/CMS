<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_elements', function (Blueprint $table) {
            		$table->increments('id');
			$table->integer('page_id');
			$table->integer('parent_id');
			$table->integer('type');
			$table->integer('x_size');
			$table->integer('y_size');
			$table->integer('position');
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
        Schema::dropIfExists('pages_elements');
    }
}
