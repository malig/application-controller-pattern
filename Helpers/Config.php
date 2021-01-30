<?php

namespace Helpers;

class Config {
	const SETTINGS_PATH = 'settings.json';

	private static $instance;
	private $settings = [];

	private function __construct() {
		$this->init();
	}

	static function go(){
		if( empty( self::$instance ) ){
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function init(){
		$array = Json::get( self::SETTINGS_PATH );
		if( $array ){
			$this->settings = $array;
		}				
	}

	static function get( $name ){		
		$settings = self::$instance->settings;
		$value = null;

		if( isset( $settings[ $name ] ) ){
			$value = $settings[ $name ];
		}

		return $value;
	}	
}