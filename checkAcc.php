<?php
	include 'db.inc' ;
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	} // if
	else {
		$acc = $_POST['inputAcc'];
		$pw = $_POST['inputPassword'];
		$query = "CALL sp_checkID( '". $acc ."' )";
		// echo $query . "</br>";
		if ( $result = $mysqli->query($query) ) {
			$row = $result->fetch_row();
			if ( $row[0] == "NotExist" )
				echo "Account is not exist";
			else {
				if ( $row[0] == crypt( $pw, $row[0] ) ) {
					session_start();
					$_SESSION['username'] = $acc;
					echo "<script>alert('Success'); location.href='./manager.php';</script>";
				} // if
				else
					echo "<script>alert('Wrong password'); location.href='./';</script>";
			} // else
		} // if
		else
			echo "Error" ;
	} // else
	$mysqli->close();
?>