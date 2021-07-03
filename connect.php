<?php

$mysqli = new mysqli('db746959971.db.1and1.com', 'dbo746959971', 'Contact@123','db746959971');
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Print host information
//echo "Connect Successfully. Host info: " . $mysqli->host_info;
?>