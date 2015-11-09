<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else if ( !isset( $_POST['rid'] ) || !isset( $_POST['inputTitle'] ) || !isset( $_POST['inputURL'] ) )
		echo "<script>alert('Please complete the form'); location.href='./recruitEditor.php';</script>";
	else {
		$query = "CALL sp_updateRecruit( ". $_POST['rid'] .", '". $mysqli->real_escape_string( htmlentities( $_POST['inputTitle'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."' )";

		// echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./recruitEditor.php';</script>";
		else
			echo "<script>alert('Failed'); location.href='./recruitEditor.php';</script>";
	} // else
	$mysqli->close();
?>