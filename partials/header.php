<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.

?>

<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="styles.css">

    <title>Five Star Guitars</title>
</head>
<body>
    <!-- Page header. (Done similarly in Bootstrap example page.) -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Five Star Guitars</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row" style="height:100vh;">
            <!-- Side Nav -->
            <div class="sidenav col-sm-2">
                <ul class="nav flex-column sticky-top">
                    <li class="nav-item"><a href="#" class="nav-link text-secondary"><i class="fa fa-credit-card fa-fw fa-lg mr-1"></i>Orders</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark"><i class="fa fa-cubes fa-fw fa-lg mr-1"></i>Products</a></li>
                </ul>
            </div>