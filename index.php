<?php require_once('php/form_out.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.point {
			width: 20px; height: 20px;
			display: block;
			margin: 10px;
		}
	</style>
</head>
<body>
	<form name="ourForm">
		<input type="text" id="creatTitlePoint" name="titlePoint">
		<input type="text" id="creatContentPoint" name="contentPoint">
		<input type="color" id="creatColorPoint" name="colorPoint">
		<input type="submit" id="buttonForm" name="ourForm__btm">
	</form>
	<?php 
	while($row = mysqli_fetch_array($sql_out))
	{
	?>
		<div class="point" style="background-color:<?php echo $row['color'];?>" id="<?php echo $row['id'];?>" title="<?php echo $row['content'];?>" alt="<?php echo $row['title'];?>"></div>
	<?php
	}
	mysqli_close($connect);
	?>
	<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js.js" type="text/javascript"></script>
</body>
</html>