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
			$table->integer('parent_id')->nullable();
			$table->integer('type')->nullable();
			$table->integer('x_size')->nullable();
			$table->integer('y_size')->nullable();
            $table->integer('position')->nullable();
            $table->text('content')->nullable();
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
