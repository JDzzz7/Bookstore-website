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
    $customer_ID = $_POST["identity"];
    $purchaseID = $_POST["purchaseID"];
    $updateOrder = $_POST["updateO"];
    $type = 'Online';
    
    $sql = "SELECT * FROM CustomerOrders WHERE customer_ID = '$customer_ID' AND order_ID = '$purchaseID' AND orderType = '$type'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        $sql = "UPDATE CustomerPurchases SET customer_purchase='$updateOrder' WHERE customer_ID = '$customer_ID' AND order_ID = '$purchaseID'";
        if ($con->query($sql) == TRUE){
            echo "<script>alert('Order Updated'); window.location.href='updateOrder.html';</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        } 
    }   
    else{
        echo "<script>alert('Either data enter for customer ID or purchase ID is invalid. Please check the customer ID and purchase ID that was entered. You can only update an order that was placed online'); window.location.href='updateOrder.html';</script>";
    }
}

$con->close();
?>