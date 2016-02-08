<?php
$logged = false;

// if not logged => login
//if($logged==false){
$url = "";
if(isset($_GET['url'])) $url = $_GET['url'];

// if logged => login
//$logged = true;


switch ($url) {
    case "tablas":
        include "pages/tables.php";
        break;
    case "buscar":
        echo "pages/searches.php";
        break;
    case "crear":
        echo "pages/forms.php";
        break;
    case "settings":
        echo "pages/settings.php";
        break;
    default;
        echo "pages/index.php";
   		break;
}
}



?>
