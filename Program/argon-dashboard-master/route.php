<?php

	$hal = $_GET['p'];
	if($hal){
		switch ($hal) {
			case 'index':
				include 'index.php';
				break;

			case 'dashboard':
				if ($_SESSION['user']) {
					include('dashboard.php');
					break;
				}else{
					header('location: ?p=index');
					break;
				}
				case 'logout':
					session_unset();
					session_destroy();
					header('location: ?p=index');
			
			default:
				include ('index.php');
				break;
		}
	}else{
		header('location: ?p=index');
	}
?>