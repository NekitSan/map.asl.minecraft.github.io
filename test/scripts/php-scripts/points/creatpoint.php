<?php
    $title = $_POST['titlePoint'];
    $content = $_POST['contentPoint'];
    $coordX = $_POST['coordPointX'];
    $coordY = $_POST['coordPointY'];
    $coordBlockPointX = $_POST['positionBlockPointX'];
    $coordBlockPointY = $_POST['positionBlockPointY'];
    $color = $_POST['colorPoint'];

    $sql = "INSERT INTO $bd_table (title, content, coordX, coordX, coordBlockPointX, coordBlockPointY, color) VALUES('$title','$content','$coordX','$coordY','$coordBlockPointX','$coordBlockPointY','$color')";

    if (!mysqli_query($connect, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    mysqli_close($connect);
