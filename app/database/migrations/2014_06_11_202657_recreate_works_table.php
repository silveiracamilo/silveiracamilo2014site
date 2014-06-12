<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RecreateWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('work_type_id');
			$table->string('title', 100);
			$table->text('description');
			$table->date('date');
			$table->string('technologies', 100);
			$table->string('produced_in', 100);
			$table->string('produced_link', 100);
			$table->string('link', 100);
			$table->string('path', 100);
			$table->string('video', 100);
			$table->string('thumb', 100);
			$table->string('swf', 100);
			$table->integer('swf_width');
			$table->integer('swf_height');
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
		Schema::drop('works');
	}

}
