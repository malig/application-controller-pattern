<?php
use Core\Command;
use Core\Request;

class AddSpace extends Command {
	function doExecute( Request $request ){
		return self::statuses('CMD_INSUFFICIENT_DATA');
	}
}