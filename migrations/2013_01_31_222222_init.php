<?php

class EventCron_Init {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('eventcron', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('queue', 30)->index();
			$table->timestamp('date');
			
			$table->timestamp('runned_at');

			$table->string('started_at', 18);
			$table->string('ended_at',   18);

			$table->text('arguments')->default('');
			$table->boolean('processed')->default(false);

			$table->timestamps();
		});

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventcron');
	}

}