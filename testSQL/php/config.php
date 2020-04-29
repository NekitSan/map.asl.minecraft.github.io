<?php

    $host = "localhost";
    $login = "admin";
    $pass = '1231';
    $name_bd = "testAJAX";
    $connect = mysqli_connect($host, $login, $pass, $name_bd);
    $bd_table = "ajaxTable";

    $connect->query("SET NAMES 'utf8' ");
    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
