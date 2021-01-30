<?php
use Core\Command;
use Core\Request;
use Models\Company;
use Providers\DataProvider;

class CreateCompany extends Command {
	function doExecute( Request $request ){
		$status = null;
		$companyName = $request->getProperty( 'companyName' );			

		if( $companyName ){
			$company = new Company( $request->getProperties() );
			$companyId = DataProvider::get()->save( $company );

			$request->setProperty( 'companyId', $companyId );
			$status = self::statuses('CMD_OK');
		}

		return $status;
	}
}