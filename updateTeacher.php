<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "CALL sp_updateTeacher( ". $_POST['tid'] .", '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputAdj'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputSpecial'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."' )";

		//echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./teacherEditor.php';</script>";
		else
			echo "No result" ;
	} // else
	$mysqli->close();
?>