<html>
<head>
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />        
</head>
<body>

</body>
</html>

<?php
require_once 'model/database.php';

session_start();

if(isset($_SESSION['sesion_iniciada'])==true){        
    $controller = 'usuario';

    if(!isset ($_REQUEST['c'])){
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->Index();
    }else{
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        call_user_func( array( $controller, $accion ) );
    }

}else{
    echo "<p> NO HAS INICIADO SESION </p>";
    echo "<p> HAZ CLICK EN EL BOTÓN DE ABAJO PARA DIRIGIRTE A LA PAGINA DEL LOGIN</p>";
    echo "<a href='login.php' class=\"btn btn-info\">Iniciar sesión</a>";
}

?>