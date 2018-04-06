<?php

		$DB_host="localhost";
		$DB_user="root";
		$DB_password="";
		$DB_database="kp";

		$db=new mysqli($DB_host, $DB_user, $DB_password, $DB_database);

	// Check connection
	if ($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	}
?>
