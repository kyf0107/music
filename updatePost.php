<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "CALL sp_updatePost( ". $_POST['nid'] .", '". $mysqli->real_escape_string( htmlentities( $_POST['inputTitle'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputContent'] ) ) ."', ". $_POST['pin'] .", ". $_POST['category'] .")";
		// $query = $mysqli->real_escape_string( $query );
		//echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./editor.php?type=1';</script>";
		else
			echo "No result" ;
	} // else
	$mysqli->close();
?>