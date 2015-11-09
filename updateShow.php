<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else if ( !isset( $_POST['inputID'] ) || !isset( $_POST['inputTitle'] ) || !isset( $_POST['inputTime'] ) )
		echo "<script>alert('Please complete the form'); location.href='./showEditor.php';</script>";
	else {
		$query = "CALL sp_updateShow( ". $_POST['inputID'] .", '". $mysqli->real_escape_string( htmlentities( $_POST['inputTitle'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputTime'] ) ) ."' )";

		// echo $_POST['inputID']."</br>". $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./showEditor.php';</script>";
		else
			echo "<script>alert('Failed'); location.href='./showEditor.php';</script>";
	} // else
	$mysqli->close();
?>