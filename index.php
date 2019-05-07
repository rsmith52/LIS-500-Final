<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Last Modified on: 4 15, 2019
// Last Modified by: Ray Smith

// Show just a message about the survey and a button to begin that takes us to the first question (Personal_Questions/q2.php):
// q1 was removed as it was unnecessary
$user_id = rand(0000000, 9999999);
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <nav>
      <h1>Group 9 Final Project</h1>
      <ul>
        <li>
          <a href="index.html">Home Page</a>
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
  </head>
  <body>
    <form method="post" action="Personal_Questions/q2.php">
        <h1>
          Welcome to Group 9's Gender Bias Test
        </h1>
        <p>Our questions focus on gender and appearance. In this survey you will be shown a series of statements about your views/beliefs on gender related topics.
          For each statement, mark the bubble next to how strongly you agree.
        </p>
        <?php echo '<p><input type="hidden" name="user_id" value="'.$user_id.'" /></p>'; ?>
        <p><input class="btn" type="submit" value="Begin The Test" /></p>
    </form>
  </body>
</html>
