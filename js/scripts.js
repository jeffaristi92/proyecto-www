
function login() {

	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var respuesta = xmlhttp.responseText;
        redireccionar(respuesta);
    	}
  	}

  	var user = $("#usuario").val();
	  var pass = $("#password").val();	

  	xmlhttp.open("GET","Controlador/ControllerLogin.php?usuario="+user+"&password="+pass,true);
  	xmlhttp.send();
}

function redireccionar(respuesta) {

  if (respuesta == "admin") {

    setTimeout("location.href='View/PanelAdminSistema.php'", 0);

  }else if (respuesta == "adminEmpresa") {

    setTimeout("location.href='View/PanelAdminEmpresa.php'", 0);

  }else if (respuesta == "cajero") {

    setTimeout("location.href='View/PanelCajero.php'", 0);
    
  }else{
    document.getElementById("respuesta").innerHTML=respuesta;
  }
  
}

function enter(){
    
    var enterKey = 13;
    if (event.keyCode == enterKey){
        login();
    }
}