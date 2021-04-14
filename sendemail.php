<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Make Me Elvis - Send Email PHP</title>
</head>
<body>
<img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
  <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
  <p><strong>Private:</strong> For Elmer's use ONLY<br />
  Write and send an email to mailing list members.</p>

  <?php
  if (isset($_POST['submit'])) {
    $from = 'email@email.com'; //owner's email
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];
    $output_form = false;

    if (empty($subject) && empty($text)) {
      // We know both $subject AND $text are blank 
      echo 'You forgot the email subject and body text.<br />';
      $output_form = true;
    }

    if (empty($subject) && (!empty($text))) {
      echo 'You forgot the email subject.<br />';
      $output_form = true;
    }

    if ((!empty($subject)) && empty($text)) {
      echo 'You forgot the email body text.<br />';
      $output_form = true;
    }
  } /* This curly brace closes the first if, which tells us if the form was submitted*/
  else {
    $output_form = true; /* If the form's never been submitted, we definitely need to show it */
  }

  if ((!empty($subject)) && (!empty($text))) {
    $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
      or die('Error connecting to MySQL server.');

    $query = "SELECT * FROM email_list";
    $result = mysqli_query($dbc, $query)
      or die('Error querying database.');

    while ($row = mysqli_fetch_array($result)){
      $to = $row['email'];
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $msg = "Dear $first_name $last_name,\n$text";
      mail($to, $subject, $msg, 'From:' . $from);
      echo 'Email sent to: ' . $to . '<br />';
    } 

    mysqli_close($dbc);
  }

  if ($output_form) {
?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!--Self referencing name of the script-->
    <label for="subject">Subject of email:</label><br />
    <input id="subject" name="subject" type="text" size="30"
    value="<?php echo $subject; ?>"/><br />
    <label for="elvismail">Body of email:</label><br />
    <textarea id="elvismail" name="elvismail" rows="8" cols="40">
    <?php echo $text; ?></textarea><br />
    <input type="submit" name="submit" value="Submit" />
    </form>

<?php
  }
?>
</body>
</html>