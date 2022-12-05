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
    $type = 'Online';

    $sql = "SELECT * FROM CustomerOrders WHERE customer_ID = '$customer_ID' AND order_ID = '$purchaseID' AND orderType = '$type'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        $sql = "DELETE FROM CustomerPurchases WHERE purchase_ID = '$purchaseID';";
        $sql .= "DELETE FROM CustomerOrders WHERE order_ID = '$purchaseID'";
        if ($con->multi_query($sql) == TRUE){
            echo "<script>alert('Customer Online Purchase Cancelled'); window.location.href='cancelOrder.html';</script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $con->error;
        } 
    }   
    else{
        echo "<script>alert('Purchase ID does not exist for the customer. Please check and re-enter purchase ID'); window.location.href='cancelOrder.html';</script>";
    }
}

$con->close();
?>