<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>Edit Category</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql = "SELECT * FROM category WHERE category_id =$getid";
        $query = $conn->query($sql);

        $data = mysqli_fetch_assoc($query);

        $category_id   = $data['category_id'];
        $category_name = $data['category_name'];
        $category_entry_date = $data['category_entry_date'];
    }

    if (isset($_GET['category_name'])) {
        $category_name = $_GET['category_name'];
        $category_entry_date = $_GET['category_entry_date'];
        $category_id = $_GET['category_id'];
        $sql1 = "UPDATE category SET category_name='$category_name', category_entry_date = '$category_entry_date' WHERE category_id = '$category_id'";
        if ($conn->query($sql1) == TRUE) {
            echo 'Updated Successful!';
        } else {
            echo 'Not Updated';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Category :<br>
        <input type="text" name="category_name" value=" <?php echo $category_name ?>"><br><br>
        Category Entry Date :<br>
        <input type="date" name="category_entry_date" value="<?php echo $category_entry_date ?>"><br><br>
        <input type="text" name="category_id" value=" <?php echo $category_id ?>" hidden>
        <input type="submit" value="update">
    </form>
</body>

</html>