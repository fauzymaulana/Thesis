<?php
	session_start();
	$_SESSION['user'] = '';
	unset($_SESSION['user']);
	session_unset();
	session_destroy();
	header('location: index.php');

	?>
<?php
	if(!$_SESSION['user']){
 		 header('location: index.php');
	}
?>	