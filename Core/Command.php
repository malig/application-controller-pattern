<?php
namespace Core;

abstract class Command {
	private $status = 0;
	
	private static $STATUS_STRINGS = array(
		'CMD_DEFAULT' 			=> 0,
		'CMD_OK' 				=> 1,
		'CMD_ERROR' 			=> 2,
		'CMD_INSUFFICIENT_DATA' => 3
	);		

	function getStatus(){
		return $this->status;
	}

	static function statuses( $str = 'CMD_DEFAULT' ){		
		if( isset( self::$STATUS_STRINGS[ $str ] ) ){
			$status = self::$STATUS_STRINGS[ $str ];
		} else {
			$status = self::$STATUS_STRINGS[ 'CMD_DEFAULT' ];			
		}		

		return $status;		
	}

	function execute( Request $request ) {
		$this->status = $this->doExecute( $request );
		
		$request->setPreviousCommand( $this );
	}	

	abstract function doExecute( Request $request );

	final function __construct() {}
}