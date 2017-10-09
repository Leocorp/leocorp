<?php
	
	function flashMessage($message, $level = 'info')
	{
		session()->flash('flash_message',$message);
		session()->flash('flash_message_level', $level);
	}