<?php
// Detect the current session
session_start();
// Include the Page Layout header
include("header.php"); 

// Reading inputs entered in previous page
$email = $_POST["email"];
$password = $_POST["password"];

// Include the PHP file that establishes database connection handle: $conn
include_once("mysql_conn.php");

// Define thge INSERT SQL statement
$qry = "SELECT ShopperID, Name, Email, Password FROM Shopper WHERE Email=? AND Password=?";

$stmt = $conn->prepare($qry);

// "ssssss" - 6 string parameters
$stmt->bind_param("ss", $email, $password);

// To Do 1 (Practical 2): Validate login credentials with database

if ($stmt->execute()) {  // SQL statement executed successfully

	while ($row =  $stmt->get_result()->fetch_assoc()) {

		// Save user's info in session variables
		$_SESSION["ShopperID"] = $row["ShopperID"];
		$_SESSION["ShopperName"] = $row["Name"];

		// To Do 2 (Practical 4): Get active shopping cart

		// Redirect to home page
		header("Location: index.php");
		exit;
	}
	echo  "<h3 style='color:red'>Invalid Login Credentials</h3>";
	
}
else {
	echo  "<h3 style='color:red'>Invalid Login Credentials</h3>";
}
	
// Include the Page Layout footer
include("footer.php");
?>