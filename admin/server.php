<?php 
    $DB_SERVER = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'crud';
	$db = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

    if(!$db){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }
   
