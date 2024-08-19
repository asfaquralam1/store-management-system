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
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql1 = "SELECT * FROM store_product WHERE store_product_id =$getid";
        $query1 = $conn->query($sql1);

        $data = mysqli_fetch_assoc($query1);

        $store_product_id   = $data['store_product_id'];
        $store_product_name      = $data['store_product_name'];
        $store_product_quentity  = $data['store_product_quentity'];
        $store_product_entry_date = $data['store_product_entry_date'];
    }
    if (isset($_GET['store_product_name'])) {
        $store_product_name      = $_GET['store_product_name'];
        $store_product_quentity  = $_GET['store_product_quentity'];
        $store_product_entry_date = $_GET['store_product_entry_date'];

        $sql = "INSERT INTO store_product (store_product_name,store_product_quentity,store_product_entry_date) VALUES('$store_product_name','$store_product_quentity','$store_product_entry_date')";

        if ($conn->query($sql2) == TRUE) {
            echo 'Updated Successful!';
        } else {
            echo 'Not Updated';
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM product";
    $query = $conn->query($sql);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Product :<br>
        <select name="store_product_name">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $data_id = $data['product_id'];
                $data_name = $data['product_name'];
            ?>
                <option value='<?php echo $data_id ?>' <?php if ($store_product_name == $data_id) {
                                                            echo 'selected';
                                                        } ?>><?php echo $data_name ?></option>;
            <?php } ?>
        </select><br><br>
        Product Quentity :<br>
        <input type="text" name="store_product_quentity" value="<?php echo $store_product_quentity ?>"><br><br>
        Store Entry Date :<br>
        <input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date ?>"><br><br>
        <input type="submit" value="update">
    </form>
</body>

</html>