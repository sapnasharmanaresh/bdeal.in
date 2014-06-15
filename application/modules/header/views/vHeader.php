<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta name="author" content="">

        <meta http-equiv="cleartype" content="on">

        <link rel="shortcut icon" href="<?php echo BASEURL; ?>favicon.ico">

        <!-- Responsive and mobile friendly stuff -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <title><?php echo $this->title; ?></title>
        <?php foreach ($this->style as $style) {
            ?>
            <link rel='stylesheet' href="<?php echo CSS . $style ?>" >
            <?php
        }
        ?>
        <!-- scripts-->
<script src="<?php echo JS ?>vendor/jquery.js"></script>
     <!--   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
       <!-- <script type="text/javascript" src="http://modernizr.com/downloads/modernizr-latest.js"></script>-->
        <script src ="<?php echo JS ?>global/global.js"></script>
        <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>-->
<script type='text/javascript' src='https://www.google.com/jsapi'></script>



        <!-- FANCY BOX -->
        <!--   <link rel = "stylesheet" href = "http://fancybox/source/jquery.fancybox.css?v=2.1.5" type = "text/css" media = "screen" / >
           <script type = "text/javascript" src = "http://fancybox/source/jquery.fancybox.pack.js?v=2.1.5" ></script> -->

        <?php
        foreach ($this->js as $js) {
            ?>
            <script src="<?php echo JS . $js ?>"></script>
            <?php
        }
        ?>
    </head>
    <body>
        <?php include_once 'google_tracking.php'; ?>
        <div id="wrapper">
            <section id="headcontainer" class="section1">
                <header class="l-header">
                    <!-- <div id="logo"></div> -->

                    <div class="section group wrapper">
                        <div class="topbar">
                            <?php
                            //    echo $_SESSION['loggedIn'];
                            if (!isset($_SESSION['loggedIn'])) {

                                include 'nav-link.php';
                            } else {
                                include 'loggedInUserLinks.php';
                            }
                            ?>
                        </div>
                    </div>  


                    <!--
                    <h1 class="inline">Bdeal</h1><h4 class=" inline">.in</h4> </div>         
                    -->
