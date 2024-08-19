<?php
require('connection.php');
?>
<!DOCTYPE html>

<head>
    <title>Edit Product</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql1 = "SELECT * FROM product WHERE product_id =$getid";
        $query1 = $conn->query($sql1);

        $data = mysqli_fetch_assoc($query1);

        $product_id   = $data['product_id'];
        $product_name = $data['product_name'];
        $product_category = $data['product_category'];
        $product_code = $data['product_code'];
        $product_entry_date = $data['product_entry_date'];
    }
    if (isset($_GET['product_name'])) {
        $product_name = $_GET['product_name'];
        $product_category = $_GET['product_category'];
        $product_code = $_GET['product_code'];
        $product_entry_date = $_GET['product_entry_date'];
        $product_id = $_GET['product_id'];

        $sql2 = "UPDATE product SET product_name = '$product_name', product_category = '$product_category', product_code= '$product_code',product_entry_date= '$product_entry_date' WHERE product_id = $product_id";
        if ($conn->query($sql2) == TRUE) {
            echo 'Updated Successful!';
        } else {
            echo 'Not Updated';
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM category";
    $query = $conn->query($sql);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Product :<br>
        <input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>
        Product Category :<br>
        <select name="product_category">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $category_id = $data['category_id'];
                $category_name = $data['category_name'];
            ?>
                <option value='<?php echo $category_id ?>' <?php if ($category_id == $product_category) {
                                                                echo 'selected';
                                                            } ?>><?php echo $category_name ?></option>;
            <?php } ?>
        </select><br><br>
        Product Code :<br>
        <input type="text" name="product_code" value="<?php echo $product_code ?>"><br><br>
        Product Entry Date :<br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>">
        <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden><br><br>
        <input type="submit" value="update">
    </form>
</body>

</html>