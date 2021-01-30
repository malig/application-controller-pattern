<?php
namespace Core;

class Mapper {
	private $viewMap = array();
	private $forwardMap = array();	

	function addView( $view, $command = 'default', $status = 0 ){
		$this->viewMap[$command][$status] = $view;
	}

	function getView( $command, $status ){
		if( isset( $this->viewMap[$command][$status] ) ){
			return $this->viewMap[$command][$status];
		}
		return null;
	}	

	function addForward( $command, $status = 0, $newCommand ){
		$this->forwardMap[$command][$status] = $newCommand;
	}

	function getForward( $command, $status ){
		if( isset( $this->forwardMap[$command][$status] ) ){
			return $this->forwardMap[$command][$status];
		}
		return null;
	}

	function getViewMap() {
		return $this->viewMap;
	}	

	function getForwardMap() {
		return $this->forwardMap;
	}
}