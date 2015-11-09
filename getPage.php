<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_GET['type'] == 0 )
			$query = "SELECT COUNT(*) AS total FROM news";
		else if ( $_GET['type'] == 1 )
			$query = "SELECT COUNT(*) AS total FROM news WHERE category = 1";
		else if ( $_GET['type'] == 2 )
			$query = "SELECT COUNT(*) AS total FROM news WHERE category = 2";

		if ( $result = $mysqli->query($query) ) {
			$obj = $result->fetch_object();
			$totalpage = ceil($obj->total / 10);
			$data[0] = array( "total"=>$totalpage );
			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>