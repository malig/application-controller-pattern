<?php
namespace Core;

use Helpers\Config;

class ApplicationController {
	private $baseCommandClass = null;		
	private $mapper;

	function __construct( Mapper $mapper ){
		$this->mapper = $mapper;
		$this->baseCommandClass = new \ReflectionClass( Config::get('base_command') );
	}

	function getCommand( Request $request ) {
		$command = null;

		if( $commandName = $this->getCommandName( $request ) ){
			$command = $this->createCommand( $commandName );			
		}

		return $command;
	}

	function getViewName( Request $request ) {
		$view = $this->getResource( $request, "View" );
		return $view;
	}	

	private function getCommandName( Request $request ) {
		$previousCommand = $request->getPreviousCommand();	

		if( $previousCommand ){			
			$commandName = $this->getNextCommandName( $request );
		} else {	
			$commandName = $request->getProperty( 'cmd' );						
		}

		return $commandName;
	}

	private function createCommand( $commandName ) {
		$command = null;			
		$pathToCommand = Config::get('commands') . "/$commandName.php";
		
		if( file_exists( $pathToCommand ) ){
			require_once ( "$pathToCommand" );

			if( class_exists( $commandName ) ){
				$commandClass = new \ReflectionClass( $commandName );

				if( $commandClass->isSubClassOf( $this->baseCommandClass ) ){
					$command = $commandClass->newInstance();
				}
			}
		}

		if( is_null( $command ) ) {
			echo "Команда '$commandName' не найдена";				
		}		

		return $command;
	}

	private function getNextCommandName( Request $request ) {
		$forward = $this->getResource( $request, "Forward" );

		if( $forward ){
			$request->setProperty( 'cmd', $forward );
		}

		return $forward;
	}			

	private function getResource( Request $request, $mode ) {		
		$commandName = $request->getProperty( 'cmd' );
		$lastCommand = $request->getPreviousCommand();

		if( $lastCommand ){
			$status = $lastCommand->getStatus();
		}		

		if( empty( $status ) ){
			$status = 0;
		}

		$acquire = "get$mode";

		$resource = $this->mapper->$acquire( $commandName, $status );
		
		if( is_null( $resource ) ){
			$resource = $this->mapper->$acquire( $commandName, 0 );
		}

		if( is_null( $resource ) ){
			$resource = $this->mapper->$acquire( 'default', $status );
		}

		if( is_null( $resource ) ){
			$resource = $this->mapper->$acquire( 'default', 0 );
		}

		return $resource;
	}			
}