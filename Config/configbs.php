<?php

#Cifrado para envio de paquetes y consultas.

define("CLIENT_ID", "AbUjklbtUIzItEo5ATdmwKxp4SlxeqCpfWUzEbWc3u8nBmYAe42_wlaa00tXbrtwY3Qd2GN-S2OUny7x");
define("CURRENCY", "USD");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

#Inicio de Sesion.
session_start();
#Visibilidad de cantidad de articulos colocados en el carrito.

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}


?>