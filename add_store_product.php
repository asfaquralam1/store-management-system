<?php
require('connection.php');
function data_list($tablename, $column1, $column2)
{
    require('connection.php');
    $sql = "SELECT * FROM $tablename";
    $query = $conn->query($sql);
    while ($data = mysqli_fetch_array($query)) {
        $data_id = $data[$column1];
        $data_name = $data[$column2];
        echo "<option value='$data_id'>$data_name</option>";
    }
}

?>
<!DOCTYPE html>

<head>
    <title>Store Product</title>
</head>

<body>
    <?php
    if (isset($_GET['store_product_name'])) {
        $store_product_name      = $_GET['store_product_name'];
        $store_product_quentity  = $_GET['store_product_quentity'];
        $store_product_entry_date = $_GET['store_product_entry_date'];

        $sql = "INSERT INTO store_product (store_product_name,store_product_quentity,store_product_entry_date) VALUES('$store_product_name','$store_product_quentity','$store_product_entry_date')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted';
        } else {
            echo 'Data not Inserted';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Product :<br>
        <select name="store_product_name">
            <?php
            data_list('product', 'product_id', 'product_name');
            ?>
        </select><br><br>
        Product Quentity :<br>
        <input type="text" name="store_product_quentity"><br><br>
        Store Entry Date :<br>
        <input type="date" name="store_product_entry_date"><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>