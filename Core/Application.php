<?php
namespace Core;

use Helpers\Config;

class Application {	
	static function go() {	
		$request = new Request();			
		$mapper = Configurator::getMapper();
		$applicationController = new ApplicationController( $mapper );				
		
		$instance = new Application();
		$instance->requestManagement( $applicationController, $request );
	}

	private function requestManagement( $applicationController, $request ) {								
		while( $command = $applicationController->getCommand( $request ) ){			
			$command->execute( $request );
		}

		$viewName = $applicationController->getViewName( $request );
		include( Config::get('views') . "/$viewName.php" );				
	}	

	private function __construct() {}
}