<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');
require_once('./includes/db.php');

// Here you might connect to the database and show off some of your newest guitars.


?>

<!DOCTYPE html>
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
                <v-spacer></v-spacer>
                <v-btn icon @click.native.stop="rightDrawer = !rightDrawer">
                    <v-icon>menu</v-icon>
                </v-btn>
            </v-toolbar>
            <main>
                <v-content>
                    <v-container fluid>
                        <page></page>
                    </v-container>
                </v-content>
            </main>
            <v-navigation-drawer fixed temporary :right="right" v-model="rightDrawer" app>
                <v-list>
                    <v-list-tile @click.native="right = !right">
                        <v-list-tile-action>
                            <v-icon light>compare_arrows</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-title>Switch drawer (click me)</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>
            <v-footer :fixed="fixed" app>
                <span>&copy; 2017</span>
            </v-footer>
        </v-app>
    </div>

    <script type="text/x-template" id="page">
<v-layout column align-center>
    <div>
    <img src="./raw/v.png" alt="Vuetify.js" class="mb-5" height="100px" />
    </div>
    <blockquote>
    &#8220;First, solve the problem. Then, write the code.&#8221;
    <footer>
        <small>
        <em>&mdash;John Johnson</em>
        </small>
    </footer>
    </blockquote>
</v-layout>
</script>

<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>
<script src="code.js"></script>

</body>

</html>