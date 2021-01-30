<?php
use Core\Command;
use Core\Request;

class ListCompanies extends Command {
	function doExecute( Request $request ){
		$status = self::statuses('CMD_OK');
		$status = null;
		return $status;
	}
}