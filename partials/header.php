<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');
require_once('./includes/db.php');

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vuetify</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
</head>

<body>
<div id="app">
    <v-app>
        <v-navigation-drawer clipped v-model="drawer" app>
            <v-list>
                <v-list-tile :value="true" v-for="(item, i) in items" :key="item.title">
                    <v-list-tile-action>
                        <v-icon light v-html="item.icon"></v-icon>
                    </v-list-tile-action>
                    <a class="list__tile list__tile-link" :href="item.href">
                        <v-list-tile-content>
                            <v-list-tile-title v-text="item.title"></v-list-tile-title>
                        </v-list-tile-content>
                    </a>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar fixed app clipped-left>
            <v-toolbar-side-icon @click.native.stop="drawer = !drawer"></v-toolbar-side-icon>
            <!-- <v-icon v-html="miniVariant ? 'chevron_right' : 'chevron_left'"></v-icon>
                    Note to self. Good way to switch icons. -->
            <v-toolbar-title v-text="title"></v-toolbar-title>
        </v-toolbar>