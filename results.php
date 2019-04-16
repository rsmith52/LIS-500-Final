<?php

// Created by: Bryan Knowles
// Based on: q-royston.php, store-answer.php
// Last Modified on: Nov 21, 2018
// Last Modified by: Bryan Knowles

// Grab the user id from the POST data sent to us from previous page
$user_id = $_POST["user_id"];

// Store the answer to the previous question, if applicable
include "store-answer.php";

// Time to retreive from the database all data we've collected for this visitor throughout the survey

// Database settings

// copy these as necessary for your own projects
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
$query = $conn->prepare("SELECT question, answer FROM sharedsurvey WHERE user_id = ? ORDER BY question ASC");
$query->bind_param("i", $user_id);

// Run our query to get the list of questions/answers for this visitor
$query->execute();
$results = $query->get_result();

// Display a "Results" label:

?>

<h1>Results</h1>

<?php

// A variable to hold the sum of our results
$sum = 0;

// Loop through the SQL results and display them, one question/answer at a time
// Calculate the sum while we're at it
while ($result = $results->fetch_assoc()){
    echo '<p><b>'.$result["question"].':</b> '.$result["answer"].'</p>';
    $sum += $result["answer"];
}

// Now display the sum we calculated
echo '<p><b>Total:</b> '.$sum.'</p>';

// Close the query and connection since we're done with them
$query->close();
$conn->close();

?>