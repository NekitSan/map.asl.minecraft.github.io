
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

$sql_out = mysqli_query($connect, "SELECT `id` ,`title` ,`positionBlockPointX` ,`positionBlockPointY` ,`color` FROM `$bd_table`");

?>
    <style>
        #result {
            position: relative;
            width: 1000px;
            height: 600px;
            margin: 0 auto;
        }
.point {
	display: block;
	position: absolute;
	width: 7px;
	height: 7px;
	transform: translate(-50%, -50%);
	border-radius: 50%;
	cursor: help;
	font-size: 0;
	z-index: 1001;
}
    </style>
        <form action="test.php" method="post">
			<input type="text" id="name" name="name">
			<input type="submit" id="btm" value="Okey">
		</form>
        <div id="result">		
	<?php 
	while($row = mysqli_fetch_array($sql_out))
	{
	?>
		<div class="point" style="left:<?php echo $row['positionBlockPointX'];?>px; top:<?php echo $row['positionBlockPointY'];?>px; background-color:<?php echo $row['color'];?>" id="<?php echo $row['id'];?>" title="<?php echo $row['title'];?>"></div>
	<?php
	}
	?>
        </div>

        <?php
        $title = $_POST['name'];
    
        $sql_insert = "INSERT INTO $bd_table (title) VALUES('$title')";
    
        if (!mysqli_query($connect, $sql_insert)) {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($connect);
        }
    
        mysqli_close($connect);
        ?>
