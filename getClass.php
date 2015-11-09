<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_GET['type'] == 1 )
			$query = "SELECT * FROM cgroup WHERE type = 1";
		else if ( $_GET['type'] == 2 )
			$query = "SELECT * FROM category WHERE type = 1";
		else if ( $_GET['type'] == 3 )
			$query = "SELECT * FROM class WHERE type = 1";
		else if ( $_GET['type'] == 4 )
			$query = "SELECT * FROM category WHERE groupID = ". $_GET['index'];
		else if ( $_GET['type'] == 5 )
			$query = "SELECT * FROM cgroup WHERE type = 2";
		else if ( $_GET['type'] == 6 )
			$query = "SELECT * FROM category WHERE type = 2";
		else if ( $_GET['type'] == 7 )
			$query = "SELECT * FROM class WHERE type = 2";
		else if ( $_GET['type'] == 8 )
			$query = "SELECT * FROM cgroup WHERE type = ". $_GET['index'];

		if ( $result = $mysqli->query($query) ) {
			for ( $i = 0 ; $row = $result->fetch_assoc() ; $i++ ) {
				// $data[$i] = array( "tid"=>$row['tid'], "name"=>$row['name'], "adj"=>$row['adj'], "special"=>$row['speciality'], "url"=>$row['url'] );
				if ( $_GET['type'] == 1 || $_GET['type'] == 5 )
					$data[$i] = array( "gid" =>$row['id'], "gname"=>$row['name'] );
				else if ( $_GET['type'] == 2 || $_GET['type'] == 6 )
					$data[$i] = array( "caid" =>$row['id'], "caname"=>$row['name'], "gid" =>$row['groupID'] );
				else if ( $_GET['type'] == 3 || $_GET['type'] == 7 )
					$data[$i] = array( "cid" =>$row['cid'], "clname"=>$row['name'], "description"=>$row['description'], "url"=>$row['url'], "gid"=>$row['groupID'], "caid"=>$row['categoryID'] );
				else if ( $_GET['type'] == 4 )
					$data[$i] = array( "caid" =>$row['id'], "caname"=>$row['name'] );
				else if ( $_GET['type'] == 8 )
					$data[$i] = array( "gid" =>$row['id'], "gname"=>$row['name'] );
			} // for

			if ( isset( $data ) )
				echo json_encode( $data ) ;
		} // if
	} // else
	$mysqli->close();
?>