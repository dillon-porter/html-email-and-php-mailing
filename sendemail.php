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

<?php 
    $from = 'email@gmail.com'; /* Owner's email address*/
    $subject = $_POST['subject'];
    $text = $_POST['elvismail'];

    $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store') /* Connecting to the database*/
    or die('Error connecting to MySQL server.'); 

    $query = "SELECT * FROM email_list";
    $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

    while ($row = mysqli_fetch_array($result)){  /* mysqli_fetch_array() stores a row of data in an array */
    $to = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $msg = "Dear $first_name $last_name,\n$text";
    mail($to, $subject, $msg, 'From:' . $from);
    echo 'Email sent to: ' . $to . '<br />';
} 

    mysqli_close($dbc);

?>

</body>
</html>