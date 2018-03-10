<?php

require_once("includes/db.php");

$productsQuery = "SELECT products.productID, products.listPrice, categories.categoryName 
    FROM products
    JOIN categories ON products.categoryID = categories.categoryID
    ORDER BY categories.categoryName;";
$products = GetMany($productsQuery, $conn);

?>

<?php include("partials/header.php"); ?> 
<!-- In context of div.container-fluid>div.row, next to div.col-sm-2 -->

<div class="col-md-4">
    <h1 class="display-4">Products</h1>
    <table class="table table-md table-hover table-striped">
        <thead>
            <tr>
                <th>Category</th>
                <th>Price</th>
            </tr>
        </thead>
        </tbody>   
            <?php foreach($products as $product): ?>
            <tr onclick="window.location='product-details.php/?product-id=<?=$product["productID"]?>';">
                <th><?=$product["categoryName"]?></th>
                <td><?="$".number_format($product["listPrice"],2)?></th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include("partials/footer.php"); ?>