<?php
use Core\Command;
use Core\Request;
use Models\Employer;
use Providers\DataProvider;

class AddEmployees extends Command {
	function doExecute( Request $request ){
		$status = null;

echo '<pre>';
print_r($request);
echo '</pre>';

		$employees = DataProvider::get()->getEmployees();
		$request->setProperty( 'employees', $employees );
		
		$employerName = $request->getProperty( 'name' );

		if( $employerName ){
			$employer = new Employer( $request->getProperties() );
			$employerId = DataProvider::get()->save( $employer );

			//$status = self::statuses('CMD_OK');			
		}		

		return $status;
	}
}