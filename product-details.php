<?php

require_once("includes/db.php");

$productID = filter_input(INPUT_GET, "product-id");

$productQuery = "SELECT productID, productName, description
    FROM products
    WHERE productID = :productID;";
$product = GetOne($productQuery, $conn, [
    ":productID" => $productID
]);

?>

<?php include("partials/header.php"); ?> 
<!-- In context of div.container-fluid>div.row, next to div.col-sm-2 -->

<div class="col-lg-6">
    <h1 class="display-4"><?=$product["productName"]?></h1>
    <p><?=htmlspecialchars($product["description"])?></p>
    <a class="btn btn-outline-primary" href="/products.php">Go Back</a>
</div>

<?php include("partials/footer.php"); ?>