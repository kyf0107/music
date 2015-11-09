<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else if ( !isset( $_POST['inputTitle'] ) || !isset( $_POST['inputURL'] ) )
		echo "<script>alert('Please complete the form'); location.href='./contactEditor.php';</script>";
	else {
		$query = "CALL sp_addContact( '". $mysqli->real_escape_string( htmlentities( $_POST['inputTitle'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."' )";

		// echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./contactEditor.php';</script>";
		else
			echo "<script>alert('Failed'); location.href='./contactEditor.php';</script>" ;
	} // else
	$mysqli->close();
?>