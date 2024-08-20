<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>List of Product</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM users";
    $query = $conn->query($sql);
    echo "<table border='1'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Action</th>
    </tr>";
    while ($data = mysqli_fetch_assoc($query)) {
        $users_id          = $data['users_id'];
        $users_first_name  = $data['users_first_name'];
        $users_last_name   = $data['users_last_name'];
        $users_email       = $data['users_email'];

        echo "<tr>
              <td>$users_first_name</td>
              <td>$users_last_name</td>
              <td>$users_email</td>
              <td><a href='edit_user.php?id=$users_id'>Edit</a></td>
        </tr>";
    }
    echo "</table>"
    ?>
</body>

</html>