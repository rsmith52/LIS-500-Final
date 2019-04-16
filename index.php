<?php

// Created by: Ray Smith, Francesca Tyler, Kaoru Ro
// Last Modified on: 4 15, 2019
// Last Modified by: Ray Smith

// Generate a random number to use to identify the visitor throughout the survey
$user_id = rand(1000000, 9999999);

// Show just a message about the survey and a button to begin that takes us to the first question (q-royston.php):

?>

<p>In this survey you will be shown a series of statements about the Harvard Implicit Bias Test, or inspired by criticism of the
  test, and you will be asked to what extent you agree or disagree with those statements. This survey should take you no more than
  15 minutes to complete.</p>
<body>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <form method="post" action="q1.php">
      <?php echo '<p><input type="hidden" name="user_id" value="'.$user_id.'" /></p>'; ?>
      <p><input type="submit" value="Begin The Test" /></p>
  </form>
</body>
