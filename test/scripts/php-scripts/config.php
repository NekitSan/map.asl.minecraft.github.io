<?php

    $host = "localhost";
    $login = "testJorikQ";
    $pass = '%q6erWt$qe1';
    $name_bd = "nekitsan";
    $connect = mysqli_connect($host, $login, $pass, $name_bd);
    $bd_table = "checkpoint";

    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    