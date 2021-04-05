<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Me Elvis - add email php</title>
</head>
<body>
<?php 
    $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store') 
    or die('Error connecting to MySQL server.');

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];

    $query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
    mysqli_query($dbc, $query)
    or die('Error querying database.');

    echo 'Customer added.';

     mysqli_close($dbc);

?>
</body>
</html>
