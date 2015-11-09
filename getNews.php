<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_GET['type'] == 0 )	// All news
			$query = "SELECT * FROM news ORDER BY pin DESC, nid DESC LIMIT 5";
		else if ( $_GET['type'] == 1 )	// All class news
			$query = "SELECT * FROM news WHERE category = 1 ORDER BY pin DESC, nid DESC LIMIT 5";
		else if ( $_GET['type'] == 2 )	// All activity news
			$query = "SELECT * FROM news WHERE category = 2 ORDER BY pin DESC, nid DESC LIMIT 5";
		else if ( $_GET['type'] == 3 && isset( $_GET['page'] ) )	// All news with indexed
			$query = "CALL sp_getIndexNews(". $_GET['page'] .")";
		else if ( $_GET['type'] == 4 && isset( $_GET['page'] ) )	// Class news with indexed
			$query = "CALL sp_getIndexClNews(". $_GET['page'] .")";
		else if ( $_GET['type'] == 5 && isset( $_GET['page'] ) )	// Class news with indexed
			$query = "CALL sp_getIndexActNews(". $_GET['page'] .")";

		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ )
				$data[$i] = array( "nid"=>$row['nid'], "title"=>$row['title'], "time"=>$row['time'], "pin"=>$row['pin'] );

			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>