<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $product_id = $_POST['product_id'];
}

//echo $product_id;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE products SET sold_quantity = sold_quantity + 1 WHERE product_id = ?");
$stmt->bind_param("i", $product_id);

$result = $stmt->execute();
//echo $result;

$conn->close();

header('Location: index.html');
exit;

?>
