<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "CALL sp_addTeacher( '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputAdj'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputSpecial'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."' )";

		// echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./manager.php';</script>";
		else
			echo "No result" ;
	} // else
	$mysqli->close();
?>