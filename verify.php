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
    $firstName = $_POST["first"];
    $lastName = $_POST["last"];
    $pass_word = $_POST["passw"];
    $seller_ID = $_POST["identity"];
    $option = $_POST["Transaction"];
    $sql = "SELECT firstName, lastName, pass_word, seller_ID FROM BookSellerDB WHERE firstName = '$firstName' AND lastName = '$lastName' AND pass_word = '$pass_word' AND seller_ID = '$seller_ID'";
    $result = $con->query($sql);
    if ($result->num_rows > 0){
        if ($option == "search"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: bookseller_records.php");
        }
        if ($option == "purchase"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: customer_purchase_form.html");
        }
        if ($option == "create"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: createAccount.html");
        }
        if ($option == "return"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: returnBook.html");
        }
        if ($option == "update"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: updateOrder.html");
        }
        if ($option == "cancel"){
            $_SESSION["seller_ID"] = $seller_ID;
            header("Location: cancelOrder.html");
        }
    }
    else {
        echo "<script>alert('BookSeller Account not found.'); window.location.href='bookstore.html';</script>";
    }
}


$con->close();
?>

