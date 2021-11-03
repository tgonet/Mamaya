<?php 
session_start(); // Detect the current session
include("header.php"); // Include the Page Layout header

// Include the PHP file that establishes database connection handle: $conn
include_once("mysql_conn.php");
?>

<!-- HTML Form to collect search keyword and submit it to the same page in server -->
<div style="width:80%; margin:auto;"> <!-- Container -->
<form name="frmSearch" method="get" action="">
    <div class="form-group row"> <!-- 1st row -->
        <div class="col-sm-9 offset-sm-3">
            <span class="page-title">Product Search</span>
        </div>
    </div> <!-- End of 1st row -->
    <div class="form-group row"> <!-- 2nd row -->
        <label for="keywords" 
               class="col-sm-3 col-form-label">Product Title:</label>
        <div class="col-sm-6">
            <input class="form-control" name="keywords" id="keywords" 
                   type="search" />
        </div>
        <div class="col-sm-3">
            <button type="submit" class='btn btn-primary'>Search</button>
        </div>
    </div>  <!-- End of 2nd row -->
</form>

<?php
// The non-empty search keyword is sent to server
if (isset($_GET["keywords"]) && trim($_GET['keywords']) != "") {
    // To Do (DIY): Retrieve list of product records with "ProductTitle" 
	// contains the keyword entered by shopper, and display them in a table.
    $keyword = $_GET["keywords"];

    $qry = "SELECT ProductID, ProductTitle FROM Product WHERE ProductTitle Like '%$keyword%' OR ProductDesc Like '%$keyword%' ORDER BY ProductTitle";

    $result = $conn->query($qry);
    
    echo "<p style='font-weight:bold'>Search results for $keyword</p>";

    while($row = $result->fetch_array()) {
        $link = "productDetails.php?pid=$row[ProductID]";
        echo "<a href='$link'>$row[ProductTitle]</a><br/ >";
    }

	
	// To Do (DIY): End of Code
}

echo "</div>"; // End of container
include("footer.php"); // Include the Page Layout footer
?>