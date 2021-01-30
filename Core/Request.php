<?php
namespace Core;

class Request {
	private $lastCommand = null;	
	private $feedback = array();
	private $properties;

	function __construct() {
		$this->properties = $_REQUEST;
	}

	function getProperties() {	
		return $this->properties;
	}	

	function getProperty( $key ) {
		if( isset( $this->properties[ $key ] ) ) {
			return $this->properties[ $key ];	
		}		
		return null;
	}

	function setProperty( $key, $val ){
		$this->properties[ $key ] = $val;	
	}

	function setPreviousCommand ( Command $command ){
		$this->lastCommand = $command;
	}

	function getPreviousCommand (){
		return $this->lastCommand;
	}	

	function addFeedback( $msg ) {
		array_push( $this->feedback, $msg );
	}

	function getFeedback() {
		return $this->feedback;
	}

	function getFeedbackString( $separator = '</br>' ) {
		return implode( $separator, $this->feedback );
	}
}