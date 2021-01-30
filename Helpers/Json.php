<?php
namespace Helpers;

class Json {	
	static function get( $path ) {
		$array = [];

		if( file_exists( $path ) ){
			$json = file_get_contents( $path );
			$array = json_decode( $json, true );		
			unset( $json );	
		}		

		return $array;
	}

	static function put( $path, $array ) {
		file_put_contents( $path, json_encode( $array ) );	          
		unset( $array );
	}	
}