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
    $first_name = $_POST["first"];
    $last_name = $_POST["last"];
    $customer_ID = $_POST["identity"];

    $sql = "SELECT first_name, last_name, customer_ID FROM CustomerDB WHERE first_name = '$first_name' AND last_name = '$last_name' AND customer_ID = '$customer_ID'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        echo "<script>alert('Customer already has an account'); window.location.href='createAccount.html';</script>";
    }
    else{
        $sql = "SELECT customer_ID FROM customerDB WHERE customer_ID = '$customer_ID'";
        $result = $con->query($sql);
        if ($result->num_rows > 0){
            echo "<script>alert('Customer ID already exists, please re-enter'); window.location.href='createAccount.html';</script>";
        }
        else{
            $sql = "INSERT INTO CustomerDB VALUES ('$first_name', '$last_name', {$customer_ID})";
            if ($con->query($sql) == TRUE){
                echo "<script>alert('Customer Account Created'); window.location.href='createAccount.html';</script>";
            }
            else{
                echo "Error: " . $sql . "<br>" . $con->error;
            }   
        }
    }
}

$con->close();
?>