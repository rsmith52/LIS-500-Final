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
?>

<?php
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
$query_all = $conn->prepare("SELECT * FROM finalgroup9 WHERE USER_ID > 0");

// Run our query to get the list of questions/answers for this visitor
$query_all->execute();

$results = $query_all->get_result();
$pronouns = array(0, 0, 0, 0, 0);
$ages = array(0, 0, 0, 0, 0, 0, 0);
$ethnicities = array(0, 0, 0, 0, 0, 0, 0, 0);
$answers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$count = 0;
while ($result = $results->fetch_assoc()) {
  $this_pronoun = $result["PRSN_2"];
  if ($this_pronoun == "She/Her/Hers") {
    $pronouns[0]++;
  } elseif ($this_pronoun == "He/Him/His") {
    $pronouns[1]++;
  } elseif ($this_pronoun == "They/Them/Theirs") {
    $pronouns[2]++;
  } elseif ($this_pronoun == "Other") {
    $pronouns[3]++;
  } else {
    $pronouns[4]++;
  }

  $this_age = $result["PRSN_3"];
  if ($this_age == "<18") {
    $ages[0]++;
  } elseif ($this_age == "18-24") {
    $ages[1]++;
  } elseif ($this_age == "25-34") {
    $ages[2]++;
  } elseif ($this_age == "35-44") {
    $ages[3]++;
  } elseif ($this_age == "45-54") {
    $ages[4]++;
  } elseif ($this_age == ">55") {
    $ages[5]++;
  } else {
    $ages[6]++;
  }

  $this_ethnicity = $result["PRSN_4"];
  if ($this_ethnicity == "White") {
    $ethnicities[0]++;
  } elseif ($this_ethnicity == "Black") {
    $ethnicities[1]++;
  } elseif ($this_ethnicity == "Hispanic") {
    $ethnicities[2]++;
  } elseif ($this_ethnicity == "Asian/Pacific Islander") {
    $ethnicities[3]++;
  } elseif ($this_ethnicity == "Native American") {
    $ethnicities[4]++;
  } elseif ($this_ethnicity == "Mixed Ethnicity") {
    $ethnicities[5]++;
  } elseif ($this_ethnicity == "Other") {
    $ethnicities[6]++;
  } else {
    $ethnicities[7]++;
  }

  $q = $result["QUES_1"];
  $answers[0] += $q;
  $q = $result["QUES_2"];
  $answers[1] += $q;
  $q = $result["QUES_3"];
  $answers[2] += $q;
  $q = $result["QUES_4"];
  $answers[3] += $q;
  $q = $result["QUES_5"];
  $answers[4] += $q;
  $q = $result["QUES_6"];
  $answers[5] += $q;
  $q = $result["QUES_7"];
  $answers[6] += $q;
  $q = $result["QUES_8"];
  $answers[7] += $q;
  $q = $result["QUES_9"];
  $answers[8] += $q;
  $q = $result["QUES_10"];
  $answers[9] += $q;
  $q = $result["QUES_11"];
  $answers[10] += $q;
  $q = $result["QUES_12"];
  $answers[11] += $q;
  $q = $result["QUES_13"];
  $answers[12] += $q;
  $q = $result["QUES_14"];
  $answers[13] += $q;
  $q = $result["QUES_15"];
  $answers[14] += $q;

  $count = $count + 1;
}

for ($i = 0; $i < count($answers); $i++) {
  $answers[$i] = $answers[$i] / $count;
}

// Close the query and connection since we're done with them
$query_all->close();
$conn->close();
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>LIS 500 - Survey Results</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <nav>
      <h1>Group 9 Final Project</h1>
      <ul>
        <li>
          <a href="index.php">Home Page</a>
        </li>
        <li>
          *
        </li>
        <li>
          <a href="results.php">Results Page</a>
        </li>
        <li>
          *
        </li>
        <li>
          <a href="ray_reflection.html">Ray's Reflection</a>
        </li>
        <li>
          *
        </li>
        <li>
          <a href="francesca_reflection.html">Francesca's Reflection</a>
        </li>
        <li>
          *
        </li>
        <li>
          <a href="kaoru_reflection.html">Kaoru's Reflection</a>
        </li>
        <li>
          *
        </li>
        <li>
          <a href="group_reflection.html">Group Reflection</a>
        </li>
      </ul>
    </nav>
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
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity: <?php echo $pers_4; ?></p>
        <h4>
          Total Responses
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Gender Pronouns</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;She/Her/Hers: <?php echo $pronouns[0]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;He/Him/His: <?php echo $pronouns[1]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;They/Them/Theirs: <?php echo $pronouns[2]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other: <?php echo $pronouns[3]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Response: <?php echo $pronouns[4]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Age</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Under 18: <?php echo $ages[0]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18-24: <?php echo $ages[1]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;25-34: <?php echo $ages[2]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;35-44: <?php echo $ages[3]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;55 or Older: <?php echo $ages[4]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Response: <?php echo $ages[5]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;White: <?php echo $ethnicities[0]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Black: <?php echo $ethnicities[1]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hispanic: <?php echo $ethnicities[2]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asian/Pacific Islander: <?php echo $ethnicities[3]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Native American: <?php echo $ethnicities[4]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mixed Ethnicity: <?php echo $ethnicities[5]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other: <?php echo $ethnicities[6]; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Response: <?php echo $ethnicities[7]; ?></p>

        <br />
        <h2>
          Survey Responses
        </h2>
        <h3>
          (5: Strongly Agree, 1: Strongly Disagree, 0: No Response)
        </h3>
        <h4>
          I find muscular women to be unattractive.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_1; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[0]; ?></p>
        <h4>
          I find muscular men to be attractive.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_2; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[1]; ?></p>
        <h4>
          I find men who are tall to be more attractive than men who are short.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_3; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[2]; ?></p>
        <h4>
          I find men who play basketball to be more masculine than men who play volleyball.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_4; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[3]; ?></p>
        <h4>
          I find women who play volleyball to be more feminine than women who play basketball.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_5; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[4]; ?></p>
        <h4>
          I view skinny men as less masculine than muscular men.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_6; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[5]; ?></p>
        <h4>
          I view skinny women as more attractive than those who are overweight.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_7; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[6]; ?></p>
        <h4>
          I think skirts are a “woman’s” clothing and should not be worn by other gender groups.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_8; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[7]; ?></p>
        <h4>
          I think drop earrings are a “woman’s” accessory and should not be worn by other gender groups.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_9; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[8]; ?></p>
        <h4>
          I think makeup is a “woman’s” thing and should not be worn by other gender groups.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_10; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[9]; ?></p>
        <h4>
          I think thigh-length shorts look less masculine on men than knee-length shorts.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_11; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[10]; ?></p>
        <h4>
          I expect women to wear dresses and heels during formal ceremonies.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_12; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[11]; ?></p>
        <h4>
          I expect men to wear suits during formal ceremonies.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_13; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[12]; ?></p>
        <h4>
          I believe men do not care about their appearance as much as other gender groups do.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_14; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[13]; ?></p>
        <h4>
          I think people should make more of an effort to use gender neutral terms in daily conversation to avoid assuming gender identity based off of appearance.
        </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Your Response: <?php echo $ques_15; ?></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Average Response: <?php echo $answers[14]; ?></p>
    </form>
  </body>
</html>
