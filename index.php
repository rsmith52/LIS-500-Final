<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Last Modified on: 4 15, 2019
// Last Modified by: Ray Smith

// Generate a random number to use to identify the visitor throughout the survey
$user_id = rand(1000000, 9999999);

// Show just a message about the survey and a button to begin that takes us to the first question (q-royston.php):

?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" action="Personal_Questions/q1.php">
        <h1>
          Welcome to Group 9's Gender Bias Test
        </h1>
        <p>In this survey you will be shown a series of statements about your views/beliefs on gender related topics.
          For each statement, mark the bubble next to how strongly you agree.
        </p>
        <?php echo '<p><input type="hidden" name="user_id" value="'.$user_id.'" /></p>'; ?>
        <p><input class="btn" type="submit" value="Begin The Test" /></p>
    </form>
  </body>
</html>
