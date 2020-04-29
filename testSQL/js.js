
function creatPoint()
{
    console.log('Hi!;');
}

function reloding()
{
   location.reload();
}

$(document).ready(function () {
    $("#buttonForm").on('click', function(){
        $.ajax({
            url: "/php/form_inp.php",
            type: "POST",
            data: ({
                titlePoint: $("#creatTitlePoint").val(),
                contentPoint: $("#creatContentPoint").val(),
                colorPoint: $("#creatColorPoint").val()
            }),
            dataType: "html",
            success: creatPoint,
            complete: reloding
        });
        
        return false;  
    });
    
    $(".point").on('click', function(){
        var idPoint = $(this).attr('id');
        $.ajax({
            url: "php/delete_point.php",
            type: "POST",
            data: ({
                id: idPoint,
            }),
            dataType: "text",
            complete: reloding
        });
        return false;  
    });
});

$(".point").on("contextmenu", function(){
    var idPoint = $(this).attr('id');
    var tPoint = $(this).attr('title');
    var cPoint = $(this).attr('alt');

    alert("Id: "+idPoint+"\nTitle: "+tPoint+"\nTitle: "+cPoint);
});



function showUser(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","/scripts/php-scripts/points/test.php",true);
    xmlhttp.send();
  }

