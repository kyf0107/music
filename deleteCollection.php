<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "CALL sp_delete( 3, ". $_GET['id'] ." )";

		echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./teacherEditor.php';</script>";
		else
			echo "Fail" ;
	} // else
	$mysqli->close();
?>