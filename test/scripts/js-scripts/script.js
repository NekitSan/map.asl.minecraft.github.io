document.querySelector(".wrap").oncontextmenu = cmenu; function cmenu() { return false; }

function deletePointBD()
{ 
	$(".pointDelete").on('click', function(){
	var idPoint = $(this).attr('id');
	$.ajax({
		url: "scripts/php/deletepoint.php",
		type: "POST",
		data: ({
			id: idPoint
		}),
		dataType: "text",
		success: reloding
	});
	});
	
}

function reloding()
{
   location.reload();
}

$(document).ready(function() {
	$("#map2d").contextmenu(function(e){
		$('.modal').fadeIn();

		var parentOffset = $(this).parent().offset(); 
		var relX = (e.pageX - parentOffset.left) - 278;
		var relY = (e.pageY - parentOffset.top) + 1;

		let coord = new realCoord(relX, relY);
		var trueCoord = coord.creaetRealCoord();

		relX = (relX + 278);
		relY = (relY + 2)
		var CoordBlockPointX = relX;
		var CoordBlockPointY = relY;

		$("#coordPointX").val(trueCoord[0]);
		$("#coordPointY").val(trueCoord[1]);
		$("#positionBlockPointX").val(CoordBlockPointX);
		$("#positionBlockPointY").val(CoordBlockPointY);

		console.log(trueCoord[0],trueCoord[1],'\n',CoordBlockPointX,CoordBlockPointY)
	});

	$("#button_creat").on("click", function(){
		$.ajax({
            url: "scripts/php/creatpoint.php",
            type: "POST",
            data: ({
                title: $("#titlePoint").val(),
                content: $("#contentPoint").val(),
                coordX: $("#coordPointX").val(),
                coordY: $("#coordPointY").val(),
                coordBlockPointX: $("#coordBlockPointX").val(),
                coordBlockPointY: $("#coordBlockPointY").val(),
                color: $("#colorPoint").val()
            }),
            dataType: "html",
            success: reloding
        });
	});

	$('.modal-close').click(function() {
		$(this).parents('.modal').fadeOut();
    	setTimeout($(this).closest('form')[0].reset(),1000);
		return false;
	});	

	$('#creatExit').click(function() {
		$(this).parents('.modal').fadeOut();
    	setTimeout($(this).closest('form')[0].reset(),1000);
		return false;
	});	

});

const maxcoord = 4480;

let map2d = {  
	coordX: 8960.0,
	coordY: 8960.0
};

let map3d = {
	coordX: 17920.0,
	coordY: 9215.0
};

function editCoord(a)
{

	if(a > maxcoord) {
		var test = (a - maxcoord);
	}
		else if(a < maxcoord)
	{
		var test = (maxcoord - a) * -1;
	}
		else if(a == maxcoord)
	{
		var test = 0;
	}
	return test;
}

class realCoord
{
	constructor(realcoordX, realcoordY)
	{
		this.realcoordX = 1 * (realcoordX);
		this.realcoordY = 1 * (realcoordY);
	}
	creaetRealCoord()
	{
	//console.log("X: ",this.realcoordX, "\nY: ",this.realcoordY);

	var tmpX = map2d.coordX * 1.00 - ((this.realcoordX * 8) * 2);
	tmpX = (tmpX - map2d.coordX) * -1;
	//console.log("noEdit_X: ", tmpX);
	tmpX = editCoord(tmpX);
	tmpX = tmpX.toFixed(0);

	var tmpY = map2d.coordY * 1.00 - ((this.realcoordY * 8) * 2);
	tmpY = (tmpY - map2d.coordY) * -1;
	//console.log("noEdit_Y: ", tmpY);
	tmpY = editCoord(tmpY);
	tmpY = tmpY.toFixed(0);


    return [tmpX, tmpY];
	}
}