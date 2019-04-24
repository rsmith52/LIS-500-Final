<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Based on: Original store-answer.php by Bryan Knowles
// Last Modified on: Apr 23, 2019
// Last Modified by: Ray Smith

// Create a new row with the random ID

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
$query = $conn->prepare("INSERT INTO finalgroup9 (RAND_ID) VALUES (?)");
$query->bind_param("i", $_POST["user_id"]);
$query2 = $conn->prepare("SELECT USER_ID FROM finalgroup9");

// Run the query to store the result of the previous question
$query->execute();
$query2->execute();

$results = $query2->get_result();
while ($result = $results->fetch_assoc()) {
    $user_id = $result["USER_ID"];
}

// Close the query and connection since we're done with them
$query->close();
$conn->close();

?>
