<?php
	include 'db.inc' ;
	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else if ( !isset( $_POST['cid'] ) || !isset( $_POST['inputTitle'] ) || !isset( $_POST['inputAuthor'] ) || !isset( $_POST['inputIntro'] ) || !isset( $_POST['inputContent'] ) || !isset( $_POST['inputURL'] ) )
		echo "<script>alert('Please complete the form'); location.href='./collectionEditor.php';</script>";
	else {
		$query = "CALL sp_updateCollection( ". $_POST['cid'] .", '". $mysqli->real_escape_string( htmlentities( $_POST['inputTitle'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputAuthor'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputIntro'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputContent'] ) ) ."', '". $mysqli->real_escape_string( htmlentities( $_POST['inputURL'] ) ) ."' )";

		// echo $query ."</br>";
		if ( $result = $mysqli->query($query) )
			echo "<script>alert('Success'); location.href='./collectionEditor.php';</script>";
		else
			echo "<script>alert('Failed'); location.href='./collectionEditor.php';</script>";
	} // else
	$mysqli->close();
?>