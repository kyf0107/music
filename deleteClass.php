<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		if ( $_GET['type'] == 1 )
			$query = "CALL sp_deleteGroup( ". $_GET['id'] ." )";
		else if ( $_GET['type'] == 2 )
			$query = "CALL sp_deleteCategory( ". $_GET['id'] ." )";
		else if ( $_GET['type'] == 3 )
			$query = "CALL sp_deleteClass( ". $_GET['id'] ." )";
		
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./editor.php?type=2';</script>";
		else
			echo "<script>alert('Fail'); location.href='./editor.php?type=2';</script>";
	} // else
	$mysqli->close();
?>