<?php
    $idDelete = ($_POST['id'] * 1);

    $delete = ("DELETE FROM `$bd_table` WHERE `id`='$idDelete'");

    $result = mysqli_query($connect, $delete) or die("Ошибка " . mysqli_error($connect)); 


    mysqli_close($connect);
