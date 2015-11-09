<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "SELECT * FROM teacher ORDER BY CONVERT(name USING big5) DESC";
		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ )
				$data[$i] = array( "tid"=>$row['tid'], "name"=>$row['name'], "adj"=>$row['adj'], "special"=>$row['speciality'], "url"=>$row['url'] );

			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>