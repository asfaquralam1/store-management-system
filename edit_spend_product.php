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
    <title>Edit spend Product</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];
        $sql1 = "SELECT * FROM spend_product WHERE spend_product_id =$getid";
        $query1 = $conn->query($sql1);

        $data = mysqli_fetch_assoc($query1);

        $spend_product_id   = $data['spend_product_id'];
        $spend_product_name      = $data['spend_product_name'];
        $spend_product_quentity  = $data['spend_product_quentity'];
        $spend_product_entry_date = $data['spend_product_entry_date'];
    }
    if (isset($_GET['spend_product_name'])) {
        $spend_product_name      = $_GET['spend_product_name'];
        $spend_product_quentity  = $_GET['spend_product_quentity'];
        $spend_product_entry_date = $_GET['spend_product_entry_date'];
        $spend_product_id = $_GET['spend_product_id'];

        $sql2 = "UPDATE spend_product SET spend_product_name = '$spend_product_name', spend_product_quentity = '$spend_product_quentity', spend_product_entry_date= '$spend_product_entry_date' WHERE spend_product_id = $spend_product_id";

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
        <select name="spend_product_name">
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $data_id = $data['product_id'];
                $data_name = $data['product_name'];
            ?>
                <option value='<?php echo $data_id ?>' <?php if ($spend_product_name == $data_id) {
                                                            echo 'selected';
                                                        } ?>><?php echo $data_name ?></option>;
            <?php } ?>
        </select><br><br>
        Product Quentity :<br>
        <input type="text" name="spend_product_quentity" value="<?php echo $spend_product_quentity ?>"><br><br>
        spend Entry Date :<br>
        <input type="date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date ?>">
        <input type="text" name="spend_product_id" value="<?php echo $spend_product_id ?>" hidden><br><br>
        <input type="submit" value="update">
    </form>
</body>

</html>