<?php

class Eventcron_Run_Task extends Task
{

	public function run($arguments = array()) 
	{
		Bundle::start('eventcron');

		if (empty($arguments)) 
		{
			echo "Please give at least on queue to execute!";
			return;
		}

		foreach ($arguments as $queue) 
			EventCron::flushDB($queue);

	}
}