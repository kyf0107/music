<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$query = "SELECT * FROM news ORDER BY nid DESC";
		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ )
				$data[$i] = array( "title"=>$row['title'], "content"=>$row['content'], "time"=>$row['time'], "pin"=>$row['pin'] );
			// $row["title"] . " " . $row["content"] . " " . $row["time"] . " " . $row["pin"] . "</br>" ;

			echo json_encode( $data ) ;
			// echo "</br>" . count($data);
		} // if
		else
			echo "No result" ;
	} // else
	$mysqli->close();
?>