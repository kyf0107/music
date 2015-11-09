<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "CALL sp_delete( 4, ". $_GET['id'] ." )";

		//echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./recruitEditor.php';</script>";
		else
			echo "<script>alert('Failed'); location.href='./recruitEditor.php';</script>";
	} // else
	$mysqli->close();
?>