<?php

	/**
	* Laravel EventCron Bundle
	*
	* Laravel bundle to queue Events to a database and 
	* later fire them through artisan or a CronJob.
	*
	* @author Hélder Duarte <cossou@gmail.com>
	* @version 0.1
	* @package laravel-eventcron
	* @license DBA License
	*
	*/

	// Disabled?
	if (! Config::get('eventcron::config.enabled')) return;

	Autoloader::map(array(
		'EventCronBase' 		=> Bundle::path('eventcron') . 'models/EventCronBase.php',
		'EventCron' 			=> Bundle::path('eventcron') . 'libraries/eventcron.php',
		'Eventcron_Run_Task' 	=> Bundle::path('eventcron') . 'tasks/run.php',
	));

	Auth::extend('EventCron', function() {
		return new EventCron;
	});
	