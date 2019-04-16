<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Based on: q-royston.php
// Last Modified on: Apr 15, 2019
// Last Modified by: Ray Smith

// Grab the user id from the POST data sent to us from the previous page
$user_id = $_POST["user_id"];

// Store the answer to the previous question, if applicable
include "../store-answer.php";

// Specify the question text to be displayed on this page
$question_text = "What race do you identify as?";

// Use the question text and the user id to create a form for this question that will take us to the next question OR the results page, whichever should come next:

?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
  </head>
  <body>
    <form method="post" action="../Questions/q1.php">
        <?php echo '<h1>'.$question_text.'</h1>'; ?>
        <?php echo '<p><input type="hidden" name="user_id" value="'.$user_id.'" /></p>'; ?>
        <?php echo '<p><input type="hidden" name="question" value="'.$question_text.'" /></p>'; ?>
        <p><input type="radio" name="answer" value="5" /> White</p>
        <p><input type="radio" name="answer" value="4" /> Black</p>
        <p><input type="radio" name="answer" value="3" /> Hispanic</p>
        <p><input type="radio" name="answer" value="2" /> Asian</p>
        <p><input type="radio" name="answer" value="1" /> Other</p>
        <p><input type="radio" name="answer" value="0" /> Prefer not to Respond</p>
        <p><input class="btn" type="submit" value="Continue" /></p>
    </form>
  </body>
</html>
