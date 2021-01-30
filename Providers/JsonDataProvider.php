<?php
namespace Providers;

use Models\Model;
use Helpers\Json;
use Helpers\Config;

class JsonDataProvider extends DataProvider {	
	function save( Model $model ) {		
		$path = $this->getPath( $model );		
		$array = Json::get( $path );
		$object = $model->toSave();
		$count = array_push( $array, $object );
		$index = $count - 1;

		Json::put( $path, $array );

		return $index;
	}

	function getEmployees(){
		$array = Json::get( Config::get( 'data' ) . '/Employer' );
		return $array;
	}	
}