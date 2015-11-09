<?php
	session_start();
	session_destroy();
	echo "<script>alert('Success'); location.href='./';</script>";
?>