<?php
session_start();
//$logged = false;

error_reporting(E_ALL);
ini_set('display_errors', '1');

function verificar_login($userid,$pass,&$result) {

$servername = "localhost";
$username = 'root';
$password = "";
$dbname = "cmd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql="SELECT * FROM `trabajador` WHERE `userid`=\"".$userid."\" and `password`=\"".$pass."\"";
$result = mysqli_query($conn, $sql);
    $count = 0;
    if (!$result){
    echo "no result";

    }else{
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['userid']= $row["userid"];
            $_SESSION['rol']= $row["rol"];
            $count++;
        }
    }
        if($count == 1)
        {
            return 1;
        }

        else
        {
            return 0;
        }
    }

}




    if(isset($_POST['login']))
    {
    	print_r($_POST['login']);
        if(verificar_login($_POST['userid'],sha1($_POST['password']),$result) == 1)
        {


    }else
        {
            echo '<div class="error">Su usuario o contraseña es incorrecto, intente nuevamente.</div>';
            //include "pages/login.php";
        }
    //if (!isset($_SESSION['logged']) /*&& $_SESSION['logged']==true*/) {

} else {
//include "pages/login.php";
}

if(isset($_SESSION['userid'])){
    $url = "";
    if(isset($_GET['url'])) $url = $_GET['url'];
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
        case "crearempresa":
            include "pages/cabecera.html";
            include "pages/crearempresa.php";
            break;
        case "crearpersona":
            include "pages/cabecera.html";
            include "pages/crearpersona.php";
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
            session_destroy();
            include "pages/login.php";
            break;
        case "busquedas":
            include "pages/cabecera.html";
            include "pages/searches.php";
            break;
        default;
            include "pages/cabecera.html";
            include "pages/index.php";
            break;
    }
}else {
    include "pages/login.php";
}
?>
