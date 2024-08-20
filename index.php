<?php
session_start();
$users_first_name =  $_SESSION['users_first_name'];
$users_last_name =  $_SESSION['users_last_name'];

if (!empty($users_first_name) && !empty($users_last_name)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Store Management System | SMS</title>
    </head>

    <body>
        <h1>Welcome to Dashboard</h1>
    </body>

    </html>

<?php
} else {
    header('location:login.php');
}
?>