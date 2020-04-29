<?php require_once('scripts/php/editpoint/outpoint.php');?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>ASL-Map</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="modal" id="modal">
				<div class="creatPoint">
				<form name="creatPoints">
					<label>Название:</label>
					<br>
					<textarea type="text" id="namePoint"></textarea>
					<br>
					<label>Описание:</label>
					<br>
					<textarea type="text" id="textPoint"></textarea>
					<br><br>
					<input id="coordPointX" type="text" style="display:none;" readonly>
					<input id="coordPointY" type="text" style="display:none;" readonly">
					<input id="positionBlockPointX" type="text" style="display:none;" readonly>
					<input id="positionBlockPointY" type="text" style="display:none;" readonly>
					<label>Цвет:</label><br>
					<input type="color" list="colorList" id="colorPoint" value="#ff0000">
					<datalist id="colorList">
						<option value="#ff0000" label="Красный">
						<option value="#FFA200" label="Оранжевый">
						<option value="#FFFB00" label="Желтый">
						<option value="#008000" label="Зелёный">
						<option value="#0000ff" label="Синий">
						<option value="#C300FF" label="Фиолетовый">
						<option value="#ffffff" label="Белый">
						<option value="#cccccc" label="Серый">
						<option value="#000000" label="Черный">
					</datalist>
					<input id="creatExit" type="submit" id="button_creat" value="Создать чекпоинт">
					<br>
					<a class="modal-close" href="#">Закрыть</a>
				</form>
				</div>
			</div>
			<map class="wrap" id="wrap">	
			
	<?php 
	while($row = mysqli_fetch_array($sql_out))
	{
	?>
		<div class="point" style="left:<?php echo $row['coordBlockPointX'];?>px; top:<?php echo $row['coordBlockPointY'];?>px; background-color:<?php echo $row['color'];?>" id="<?php echo $row['id'];?>" title="<?php echo $row['content'];?>"></div>
	<?php
	}
	?>
				<img class="maping" id="map2d" src="https://github.com/NekitSan/ASL_std./blob/master/asl-mapping.ru/www/imager/maps/min/oldmedievalminecraft2-min.jpg?raw=true" alt="map - 2d">
			</map>
		</div>
	</div>
	<script src="https://yandex.st/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
	<script src="scripts/js/script.js" type="text/javascript" async></script>
	<?php
		$connect->close();
	?>
</body>
</html>