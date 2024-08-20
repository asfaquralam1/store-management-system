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
    <title>spend Product</title>
</head>

<body>
    <?php
    if (isset($_GET['spend_product_name'])) {
        $spend_product_name      = $_GET['spend_product_name'];
        $spend_product_quentity  = $_GET['spend_product_quentity'];
        $spend_product_entry_date = $_GET['spend_product_entry_date'];

        $sql = "INSERT INTO spend_product (spend_product_name,spend_product_quentity,spend_product_entry_date) VALUES('$spend_product_name','$spend_product_quentity','$spend_product_entry_date')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted';
        } else {
            echo 'Data not Inserted';
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Product :<br>
        <select name="spend_product_name">
            <?php
            data_list('product', 'product_id', 'product_name');
            ?>
        </select><br><br>
        Product Quentity :<br>
        <input type="text" name="spend_product_quentity"><br><br>
        Spend Entry Date :<br>
        <input type="date" name="spend_product_entry_date"><br><br>
        <input type="submit" value="submit">
    </form>
</body>

</html>