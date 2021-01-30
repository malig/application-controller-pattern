<?php
namespace Core;

use Helpers\Config;

class Configurator {			
	private static $instance 	= null;
	private static $mapper 		= null;			
	private static $config 	= [];

	static function go() {
		$instance = self::init();	
		$instance->load();
		$instance->createMapper();
	}

	static function getMapper() {
		return self::$mapper;
	}	

	private function load() {
		self::$config = simplexml_load_file( Config::get('config') );
	}

	private function createMapper() {		
		self::$mapper = new Mapper();
						
		foreach( self::$config->view as $defaultView ){			
			$viewName 		= 	(string) $defaultView;
			$statusName 	= 	(string) $defaultView['status'];					
			$status 		= 	Command::statuses( $statusName );

			self::$mapper->addView( $viewName, 'default', $status );
		}

		foreach( self::$config->command as $command ){								
			$commandName 	= 	(string) $command['name'];
			$viewName 		= 	(string) $command->view;
			$statusName 	= 	(string) $command->status['value'];
			$newCommand 	= 	(string) $command->status->forward;			
			$status 		= 	Command::statuses( $statusName );

			self::$mapper->addView( $viewName, $commandName, 0 );
			
			if( $newCommand ){
				self::$mapper->addForward( $commandName, $status, $newCommand );
			}			
		}										
	}

	private function __construct () {}	

	private static function init() {
		if ( is_null( self::$instance ) ){
			self::$instance = new self();
		}
		return self::$instance;
	}	
}