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

session_start();
$seller_ID = $_SESSION['seller_ID'];
$sql = "SELECT firstName, lastName, BookSellerDB.seller_ID, phone_num, email, first_name, last_name, CustomerOrders.customer_ID, books_purchased, customer_purchase, date_time, payment_type, orderType, shipping_address, purchase_ID FROM BookSellerDB INNER JOIN CustomerOrders ON BookSellerDB.seller_ID = CustomerOrders.seller_ID INNER JOIN CustomerPurchases ON CustomerOrders.order_ID = CustomerPurchases.order_ID INNER JOIN CustomerDB ON CustomerPurchases.customer_ID = CustomerDB.customer_ID WHERE BookSellerDB.seller_ID = {$seller_ID}";
$result=$con->query($sql);
echo "<head><link rel='stylesheet' href='table.css'><style>ul {list-style-type: none; margin: 0; padding: 3; overflow: hidden; background-color: #330066;} li {float: left; font-weight: bold; font-size: 20; } li a {display: block; color: white; text-align: center; padding: 15px 19px; text-decoration: none;} li a:hover {background-color: #8000ff;}</style></head>";
echo "<body><ul><li><a href='bookstore.html'>Home</a></li><li><a href='bookseller_records.php'>Search Bookseller's Records</a></li><li><a href='customer_purchase_form.html'>Customer Purchases</a></li><li><a href='returnBook.html'>Customer's Book/Order Return</a></li><li><a href='updateOrder.html'>Update A Customer's Book Order</a></li><li><a href='cancelOrder.html'>Cancel a Customer's Book Order</a></li><li><a href='createAccount.html'>Create Customer Account</a></li></ul><h1 style='color:white;'>The Story Keeper BookStore</h1>";
echo "<form id='book_form'>";
if ($result->num_rows > 0){
    echo "<table border='1'><tr><th>Book Seller First Name</th><th>Book Seller Last Name</th><th>Book Seller ID</th><th>Book Seller Phone</th><th>Book Seller Email</th><th>Customer First Name</th><th>Customer Last Name</th><th>Customer ID</th><th>In Store Purchases</th><th>Online Purchases</th><th>Purchase Date & Time</th><th>PaymentType</th><th>OrderType</th><th>Shipping Address</th><th>Purchase ID</th></tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['lastName'] . "</td>";
        echo "<td>" . $row['seller_ID'] . "</td>";
        echo "<td>" . $row['phone_num'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['customer_ID'] . "</td>";
        echo "<td>" . $row['books_purchased'] . "</td>";
        echo "<td>" . $row['customer_purchase'] . "</td>";
        echo "<td>" . $row['date_time'] . "</td>";
        echo "<td>" . $row['payment_type'] . "</td>";
        echo "<td>" . $row['orderType'] . "</td>";
        echo "<td>" . $row['shipping_address'] . "</td>";
        echo "<td>" . $row['purchase_ID'] . "</td>";
        echo "</tr>";
    };
    echo "</table>";
}
echo "</form></body>";
//else{
 //   echo "Error in ".$sql."<br>".$con->error;
 // }


$con->close();
?>