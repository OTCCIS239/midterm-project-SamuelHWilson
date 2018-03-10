<?php

require_once("includes/db.php");

$orderID = filter_input(INPUT_GET, "order-id");

$orderQuery = "SELECT * FROM orders
	INNER JOIN customers ON orders.customerID = customers.customerID
	INNER JOIN orderItems ON orders.orderID = orderitems.orderID
	INNER JOIN products ON orderitems.productID = products.productID
	INNER JOIN addresses ON customers.billingAddressID = addresses.addressID
	WHERE orders.orderID = :orderID;";
$orderParts = GetMany($orderQuery, $conn, [
    ":orderID" => $orderID
]);
var_dump($orderParts);
$generalInfo = $orderParts[0];

$address = $generalInfo["line1"]." ".$generalInfo["line2"].", ".$generalInfo["city"]." ".$generalInfo["state"]." ".$generalInfo["zipCode"];

$total = 0;
$totalDiscount = 0;
foreach($orderParts as $part) {
    $total += $part["itemPrice"];
    $totalDiscount += $part["discountAmount"];
}
$total += ($generalInfo["taxAmount"] + $generalInfo["shipAmount"])

?>

<?php include("partials/header.php"); ?> 
<!-- In context of div.container-fluid>div.row, next to div.col-sm-2 -->

<div class="col-lg-5">
    <h1 class="display-4">General Information</h1>
    <table class="table table-sm table-hover table-striped">
        </tbody>   
            <tr>
                <th>Order Date</th>
                <td><?=$generalInfo["orderDate"]?></td>
            </tr>
            <tr>
                <th>Ship Date</th>
                <td><?=($generalInfo["shipDate"] != null ? $generalInfo["shipDate"] : "N/A")?></td>
            </tr>
            <tr>
                <th>CCN</th>
                <td><?=$generalInfo["cardNumber"]?></td>
            </tr>
            <tr>
                <th>Billing Address</th>
                <td><?=$address?></td>
            </tr>
            <tr>
                <th>Total Discount</th>
                <td><?="$".number_format($totalDiscount, 2)?></td>
            </tr>
            <tr>
                <th>Tax</th>
                <td><?="$".number_format($generalInfo["taxAmount"], 2)?></td>
            </tr>
            <tr>
                <th>Shipping</th>
                <td><?="$".number_format($generalInfo["shipAmount"], 2)?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?="$".number_format($total, 2)?></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-outline-primary" href="/index.php">Go Back</a>
</div>
<div class="col-lg-5">
    <h1 class="display-4">Ordered Items</h1>
    <table class="table table-sm table-hover table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price After Discount</th>
            </tr>
        </thead>
        </tbody>   
            <?php foreach($orderParts as $part): ?>
            <tr>
                <td><?=$part["productName"]?></td>
                <td><?="$".number_format($part["itemPrice"], 2)?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include("partials/footer.php"); ?>