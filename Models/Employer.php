<?php
namespace Models;

class Employer extends Model {
	protected $properties = [
		'id' 			=> 0,
		'companyId' 	=> 0,
		'name' 			=> '',
		'position' 		=> '',
		'manager' 		=> '',
		'salaryType' 	=> '',
		'salary' 		=> '',
		'child' 		=> []
	];
}