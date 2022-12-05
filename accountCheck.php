<?php
//Makes DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $seller_ID = $_SESSION['seller_ID'];
    $first_name = $_POST["first"];
    $last_name = $_POST["last"];
    $customer_ID = $_POST["identity"];
    $inStore = $_POST["inStore"];
    $online = $_POST["online"];
    $dateTime = $_POST["dateTime"];
    $payType = $_POST["payType"];
    $orderType = $_POST["orderType"];
    $shipAddress = $_POST["shipAddress"];

    $sql = "SELECT first_name, last_name, customer_ID FROM CustomerDB WHERE first_name = '$first_name' AND last_name = '$last_name' AND customer_ID = '$customer_ID'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        $orderID = mt_rand(100, 999);
        $sql = "INSERT INTO CustomerOrders (books_purchased, shipping_address, seller_ID, customer_ID, order_ID, orderType) VALUES ('$inStore', '$shipAddress', {$seller_ID}, {$customer_ID}, {$orderID}, '$orderType');";
        $sql .= "INSERT INTO CustomerPurchases VALUES ('$online', '$dateTime', '$payType', {$customer_ID}, {$orderID}, {$orderID})";
        if ($con->multi_query($sql) == TRUE){
            echo "<script>alert('Customer Purchase Placed'); window.location.href='customer_purchase_form.html';</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        }           
    }
    else{
        echo "<script>alert('CUSTOMER CANNOT BE FOUND. RECHECK DATA ENTERED. OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.'); window.location.href='createAccount.html';</script>";
    }

}

$con->close();
?>