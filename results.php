<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Based on: q-royston.php, store-answer.php by Bryan Knowles
// Last Modified on: Apr 23, 2019
// Last Modified by: Ray Smith

// Grab the user id from the POST data sent to us from previous page
$user_id = $_POST["user_id"];

// Store the answer to the previous question, if applicable
include "store-answer_p.php";

// Time to retreive from the database all data we've collected for this visitor throughout the survey

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

// Run our query to get the list of questions/answers for this visitor

// Display a "Results" label:
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" action="Personal_Questions/q2.php">
        <h1>
          Results
        </h1>
        <p>
        </p>
    </form>
  </body>
</html>

<?php

// Close the query and connection since we're done with them
$query->close();
$conn->close();

?>
