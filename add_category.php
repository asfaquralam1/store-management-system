<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>Add Category</title>
</head>

<body>
    <?php
    if (isset($_GET['category_name'])) {
        $category_name      = $_GET['category_name'];
        $category_entrydate = $_GET['category_entrydate'];

        $sql = "INSERT INTO category (category_name,category_entrydate) VALUES('$category_name','$category_entrydate')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted';
        } else {
            echo 'Data not Inserted';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Category :<br>
        <input type="text" name="category_name"><br><br>
        Category Entry Date :<br>
        <input type="date" name="category_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>