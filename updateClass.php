<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_POST['type'] == 1 )
			$query = "UPDATE cgroup SET name = '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', type = ". $_POST['inputType'] ." WHERE id = ". $_POST['inputID'] ;
		else if ( $_POST['type'] == 2 ) {
			$query = "CALL sp_updateCategory( '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', ". $_POST['inputID'] .", ". $_POST['inputGroup'] .", ". $_POST['inputType'] ." )";
		} // else if
		else if ( $_POST['type'] == 3 ) {
			// echo $_POST['inputID'] ." ". $_POST['inputGroup'] ." ". $_POST['inputCategory'] ;
			$query = "CALL sp_updateClass( '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputDes'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."', ". $_POST['inputID'] .", ". $_POST['inputGroup'] .", ". $_POST['inputCategory'] .", ". $_POST['inputType'] ." )";
		} // else if
		// $query = $mysqli->real_escape_string( $query );
		//echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./editor.php?type=2';</script>";
		else
			echo "<script>alert('Fail'); location.href='./editor.php?type=2';</script>";
	} // else
	$mysqli->close();
?>