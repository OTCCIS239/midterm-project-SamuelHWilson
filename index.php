<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');
require_once('./includes/db.php');

// Here you might connect to the database and show off some of your newest guitars.

var_dump(GetMany("SELECT * FROM categories", $conn));
?>

