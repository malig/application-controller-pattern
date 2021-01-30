<?php
namespace Models;

abstract class Model {
	protected $properties = [];

	function __construct( array $properties=array() ) {
        foreach ( $properties as $key => $value ) {
            if( isset($this->properties[ $key ]) ){
                $this->properties[ $key ] = $value;
            }            
        }
	}

	function toSave(){
		return $this->properties;
	}
}