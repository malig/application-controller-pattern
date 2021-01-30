<?php
use Core\Command;
use Core\Request;

class AddVenue extends Command {
	function doExecute( Request $request ){
		$name = $request->getProperty( "venueName" );				

		if( is_null( $name ) ){
			$status = self::statuses('CMD_INSUFFICIENT_DATA');
		} elseif ( !$name ) {
			$request->addFeedback( "Имя не задано" );
			$status = self::statuses('CMD_INSUFFICIENT_DATA');
		} else {
			$request->addFeedback( "'$name' добавлено");
			$status = self::statuses('CMD_OK');
		}

		return $status;
	}
}