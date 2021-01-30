<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">				
	</head>

	<body>
		<section class="jumbotron text-center">
			<div class="container">
				<?php 
					require_once( 'Helpers/Autoloader.php' );					
					Autoloader::go();
										
					Helpers\Config::go();
					Core\Configurator::go();
					Core\Application::go();										
				?>	
			</div>
		</section>				
	</body>	
</html>