<?php
session_start();
//$logged = false;
    $nombreempresa;
    $idpersona;
    $idexpediente;
if (!isset($_SESSION['logged']) /*&& $_SESSION['logged']==true*/) {
$url = "";
if(isset($_GET['url'])) $url = $_GET['url'];

// if logged => login
//$logged = true;



switch ($url) {
    case "tablas":
    	include "pages/cabecera.html";
        include "pages/tables.php";
        break;
    case "buscar":
    	include "pages/cabecera.html";
        include "pages/searches.php";
        break;
    case "crear":
    	include "pages/cabecera.html";
        include "pages/forms.php";
        break;
    case "settings":
    	include "pages/cabecera.html";
        include "pages/settings.php";
        break;
    case "panel":
    	include "pages/cabecera.html";
        include "pages/index.php";
   		break;
   	case "login":
        include "pages/login.php";
   		break;	
   	case "logout":
        include "pages/login.php";
   		break;		
    default;
    	include "pages/cabecera.html";
        include "pages/index.php";
   		break;
}
} else {
include "pages/login.php";
}

?>
