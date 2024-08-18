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
        $category_entrydate = $data['category_entrydate'];
    }
    ?>
    <form action="edit_category.php" method="get">
        Category :<br>
        <input type="text" name="category_name" value=" <?php echo $category_name ?>"><br><br>
        Category Entry Date :<br>
        <input type="date" name="category_entrydate" value=" <?php echo $category_entrydate ?>"><br><br>
        <input type="text" name="category_id" value=" <?php echo $category_id ?>" hidden><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>