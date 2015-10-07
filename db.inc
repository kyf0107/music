<?php
	/*
	$db_server = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$db_user = getenv('adminmg7lLUY');
	$db_pw = getenv('Wl7sjdsrxraC');
	$db_database = getenv('music');
	$mysqli = new mysqli( $db_server, $db_user, $db_pw, $db_database );
	*/
	$mysqli = new mysqli("127.8.0.130:3306", "cycumusic", "rock&roll777", "music");
	if (!$mysqli->set_charset("utf8")) {
	    printf("Error loading character set utf8: %s\n", $mysqli->error);
	}
?>