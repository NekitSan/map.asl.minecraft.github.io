<?php
include('config.php');

$inp = $_POST['titlePoint'];
$inp1 = $_POST['contentPoint'];
$inp_color = $_POST['colorPoint'];

$sql = "INSERT INTO $bd_table (title, content, color) VALUES('$inp','$inp1','$inp_color')";

if (!mysqli_query($connect, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
