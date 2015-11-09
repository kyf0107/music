<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "SELECT id, title, DATE_FORMAT(time,'%Y-%c-%d %H:%i') as time FROM shows_table ORDER BY id";
		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ )
				$data[$i] = array( "id"=>$row['id'], "title"=>$row['title'], "time"=>$row['time'] );

			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>