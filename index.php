<?php

require_once("includes/db.php");

$filterShipped = filter_input(INPUT_GET, "shipped");
$whereClause = "";
switch($filterShipped) {
    case "shipped": $whereClause = " WHERE orders.shipDate IS NOT NULL "; break;
    case "unshipped": $whereClause = " WHERE orders.shipDate IS NULL"; break;
}

$orderQuery = "SELECT orders.orderID, customers.firstName, customers.lastName, customers.emailAddress, orders.orderDate, orders.shipDate 
    FROM orders
    JOIN customers ON orders.customerID = customers.customerID 
    ".$whereClause."
    ORDER BY orders.orderID;";
$orders = GetMany($orderQuery, $conn);

?>

<?php include("partials/header.php"); ?> 
<!-- In context of div.container-fluid>div.row, next to div.col-sm-2 -->

<div class="col-lg-6">
    <h1 class="display-4">Orders</h1>
    <table class="table table-md table-hover table-striped table-responsive">
        <thead>
            <tr>
                <th>id#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Order Date</th>
                <th>Shipped</th>
            </tr>
        </thead>
        </tbody>   
            <?php foreach($orders as $order): ?>
            <tr onclick="window.location='order-details.php/?order-id=<?=$order["orderID"]?>';">
                <th><?=$order["orderID"]?></th>
                <td><?=$order["firstName"]." ".$order["lastName"]?></th>
                <td><?=$order["emailAddress"]?></th>
                <td><?=$order["orderDate"]?></th>
                <td>
                    <?php if($order["shipDate"] != NULL) echo '<i class="fa fa-cube fa-lg" style="color:#4b2f06"></i>';?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="col-lg-4">
    <h1 class="display-4">Filter</h1>
    <form>
        <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="shipped" id="shipped1" value="all" <?php if($filterShipped == "all" || $filterShipped == NULL) echo "checked"?>>
            <label class="form-check-label" for="shipped1">All Orders</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="shipped" id="shipped2" value="shipped" <?php if($filterShipped == "shipped") echo "checked"?>>
            <label class="form-check-label" for="shipped1">Shipped Orders</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="shipped" id="shipped3" value="unshipped" <?php if($filterShipped == "unshipped") echo "checked"?>>
            <label class="form-check-label" for="shipped1">Unshipped Orders</label>
        </div>

        <input class="btn btn-outline-primary mt-4" type="submit" value="Filter Results">
    </form>
    <a class="btn btn-outline-danger" href="/index.php">Clear All Filters</a>
</div>

<?php include("partials/footer.php"); ?>