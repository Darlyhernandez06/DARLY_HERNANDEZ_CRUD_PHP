<?php

require_once(__DIR__."/../../LIBS/Database.php");

require_once(__DIR__."/../../LIBS/Modelo.php");

include_once("../../CLASES/Aprendiz.php");

$database = new Database();

$connection = $database->getConnection($database);

$aprendiz = new Aprendiz($connection);

$id = $_REQUEST["id"];

$nombre = isset($_POST["first_name"]) ? 
    ($_POST["first_name"] != "" ? $_POST["first_name"] : false) : 
    false;

$apellido = isset($_POST["lats_name"]) ? 
    ($_POST["lats_name"] != "" ? $_POST["lats_name"] : false) : 
    false;

$fecha = isset($_POST["birthdate"]) ? 
    ($_POST["birthdate"] != "" ? $_POST["birthdate"] : false) : 
    false;

$correo = isset($_POST["email"]) ? 
    ($_POST["email"] != "" ? $_POST["email"] : false) : 
    false;

$telefono = isset($_POST["phone"]) ? 
    ($_POST["phone"] != "" ? $_POST["phone"] : false) : 
    false;

$dni = isset($_POST["dni"]) ? 
    ($_POST["dni"] != "" ? $_POST["dni"] : false) : 
    false;

$cuenta  = isset($_POST["user_account"]) ? 
    ($_POST["user_account"] != "" ? $_POST["user_account"] : false) : 
    false;

$promedio = isset($_POST["average"]) ? 
    ($_POST["average"] != "" ? $_POST["average"] : false) : 
    false;

$aprendiz -> update($id,[
   'first_name' => $nombre,
   'lats_name' => $apellido,
   'birthdate' => $fecha,
   'email' => $correo,
   'phone' => $telefono,
   'user_account' => $cuenta,
   'average' => $promedio,
   ]
);

header('Location:'. 'listar.php');