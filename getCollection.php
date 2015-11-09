<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "SELECT * FROM collection ORDER BY cid";
		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ )
				$data[$i] = array( "cid"=>$row['cid'], "title"=>$row['title'], "author"=>$row['author'], "intro"=>$row['introduction'], "content"=>$row['content'] , "url"=>$row['url'] );
			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>