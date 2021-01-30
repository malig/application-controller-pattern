<?php
namespace Providers;

use Helpers\Config;
use Models\Model;

abstract class DataProvider{
	static private $provider;

	abstract function save( Model $model );

	static function get(){

		if( empty( self::$provider ) ){
			switch ( Config::get( 'provider_type' ) ) {
				case 'json':
					self::$provider = new JsonDataProvider();
					break;
				
				default:
					self::$provider = new JsonDataProvider();
					break;
			}			
		}

		return self::$provider;
	}

	protected function getPath( Model $model ){
		$fileName = (new \ReflectionClass( $model ))->getShortName();
		$path = Config::get( 'data' ) . '/' . $fileName;
		return $path;		
	}	
}