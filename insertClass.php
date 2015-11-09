<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_POST['type'] == 1 )
			$query = "INSERT INTO cgroup( name, type ) VALUES( '". $mysqli->real_escape_string( htmlentities(  $_POST['inputName'] ) ) ."', ". $_POST['inputType'] .")";
		else if ( $_POST['type'] == 2 ) {
			if ( $_POST['inputGroup'] == 0 )
				echo "<script>alert('Invalid group!'); location.href='./editor.php?type=2';</script>";
			else
				$query = "INSERT INTO category( name, groupID, type ) VALUES( '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', '". $_POST['inputGroup'] ."', ". $_POST['inputType'] ." )";
		} // else if
		else if ( $_POST['type'] == 3 ) {
			if ( $_POST['inputGroup'] == 0 )
				echo "<script>alert('Invalid group!'); location.href='./editor.php?type=2';</script>";
			else if ( $_POST['inputCategory'] == 0 )
				echo "<script>alert('Invalid category!'); location.href='./editor.php?type=2';</script>";
			else
				$query = "INSERT INTO class( name, description, url, groupID, categoryID, type ) VALUES( '". $mysqli->real_escape_string( htmlentities( $_POST['inputName'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputDes'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."', '". $_POST['inputGroup'] ."', '". $_POST['inputCategory'] ."', ". $_POST['inputType'] ." )";
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