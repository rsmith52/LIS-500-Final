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
$query_user = $conn->prepare("SELECT * FROM finalgroup9 WHERE USER_ID = '$user_id'");

// Run our query to get the list of questions/answers for this visitor
$query_user->execute();


$results = $query_user->get_result();
while ($result = $results->fetch_assoc()) {
    $pers_2 = $result["PRSN_2"];
    $pers_3 = $result["PRSN_3"];
    $pers_4 = $result["PRSN_4"];

    $ques_1 = $result["QUES_1"];
    $ques_2 = $result["QUES_2"];
    $ques_3 = $result["QUES_3"];
    $ques_4 = $result["QUES_4"];
    $ques_5 = $result["QUES_5"];
    $ques_6 = $result["QUES_6"];
    $ques_7 = $result["QUES_7"];
    $ques_8 = $result["QUES_8"];
    $ques_9 = $result["QUES_9"];
    $ques_10 = $result["QUES_10"];
    $ques_11 = $result["QUES_11"];
    $ques_12 = $result["QUES_12"];
    $ques_13 = $result["QUES_13"];
    $ques_14 = $result["QUES_14"];
    $ques_15 = $result["QUES_15"];
}

// Close the query and connection since we're done with them
$query_user->close();
$conn->close();
/*
$personal_responses = array(
  "She/Her/Hers" => "0",
  "He/Him/His" => "0",
  "They/Them/Theirs" => "0",
  "Other Pronouns" => "0",
  "No Pronoun Response" => "0",
  "<18" => "0",
  "18-24" => "0",
  "25-34" => "0",
  "35-44" => "0",
  "45-54" => "0",
  ">55" => "0",
  "No Age Response" => "0",
  "White" => "0",
  "Black" => "0",
  "Hispanic" => "0",
  "Asian/Pacific Islander" => "0",
  "Native American" => "0",
  "Other Race" => "0",
  "No Race Response" => "0",
);
$results = $query_all->get_result();
while ($result = $results->fetch_assoc()) {

}*/

// Display a "Results" label:
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" action="">
        <h1>
          Results
        </h1>
        <h2>
          Survey Demographics
        </h2>
        <h4>
          Your Responses
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Gender Pronouns: <?php echo $pers_2; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Age: <?php echo $pers_3; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Race: <?php echo $pers_4; ?></p>
        <h4>
          Total Responses
        </h4>
        <br />
        <h2>
          Survey Responses - (5: Strongly Agree, 1: Strongly Disagree, 0: No Response)
        </h2>
        <h4>
          I find muscular women to be unattractive.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;:Your Response <?php echo $ques_1; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;:Average Response <?php echo $ques_1; ?></p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;I find muscular men to be attractive: <?php echo $ques_2; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I find men who are tall to be more attractive than men who are short: <?php echo $ques_3; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I find men who play basketball to be more masculine than men who play volleyball: <?php echo $ques_4; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I find women who play volleyball to be more feminine than women who play basketball: <?php echo $ques_5; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I view skinny men as less masculine than muscular men: <?php echo $ques_6; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I view skinny women as more attractive than those who are overweight: <?php echo $ques_7; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I think skirts are a “woman’s” clothing and should not be worn by other gender groups: <?php echo $ques_8; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I think drop earrings are a “woman’s” accessory and should not be worn by other gender groups: <?php echo $ques_9; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I think makeup is a “woman’s” thing and should not be worn by other gender groups: <?php echo $ques_10; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I think thigh-length shorts look less masculine on men than knee-length shorts: <?php echo $ques_11; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I expect women to wear dresses and heels during formal ceremonies: <?php echo $ques_12; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I expect men to wear suits during formal ceremonies: <?php echo $ques_13; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I believe men do not care about their appearance as much as other gender groups do: <?php echo $ques_14; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;I think people should make more of an effort to use gender neutral terms in daily conversation to avoid assuming gender identity based off of appearance: <?php echo $ques_15; ?></p>
    </form>
  </body>
</html>
