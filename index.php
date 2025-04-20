<?php
include "generic/Autoload.php";

use generic\Controller;

if (isset($_GET["param"])) {
    $controller = new Controller();
    $controller->verificarChamadas($_GET["param"]);
} else {
    header("Location: /mvc-consultas/consulta/lista");
}