<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Based on: Original store-answer.php by Bryan Knowles
// Last Modified on: Apr 23, 2019
// Last Modified by: Ray Smith

// Store data from personal question

// Database settings
$mysql_server="localhost";
$mysql_db="raroyst1_raroystonorgmain";
$mysql_port="3306";
$mysql_user="raroyst1_cfbd_cg";
$mysql_password="W!SCsin2018";

// Connect to the database
$conn = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);

// Whoops. This shouldn't happen, but if we can't connect to the database "blow up" and stop here
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare our query
$user = $_POST["user_id"];
$column = $_POST["question"];
$answer = $_POST["answer"];

$query = "UPDATE finalgroup9 SET $column = '$answer' WHERE USER_ID = '$user'";

// Run the query to store the result of the previous question
if ($conn->query($query) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
}

// Close the connection since we're done with it
$conn->close();

?>
