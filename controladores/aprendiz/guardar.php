<?php

require_once(__DIR__."/../../LIBS/Database.php");

require_once(__DIR__."/../../LIBS/Modelo.php");

include_once("../../CLASES/Aprendiz.php");


$nombre = isset($_POST["first_name"]) ? 
    ($_POST["first_name"] != "" ? $_POST["first_name"] : false) : 
    false;

$apellido = isset($_POST["lats_name"]) ? 
    ($_POST["lats_name"] != "" ? $_POST["lats_name"] : false) : 
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

$cuenta = isset($_POST["user_account"]) ? $_POST["user_account"] : ' ';
$promedio = isset($_POST["average"]) ? $_POST["average"] : ' ';

if ($nombre && $apellido && $correo && $telefono && $dni){
    echo "Guardar";
    $database = new Database();
    
    $connection = $database->getConnection($database);
    
    $aprendiz = new Aprendiz($connection);

    $valor = $aprendiz -> store([
        'first_name' => $nombre,
        'lats_name' => $apellido,
        'email' => $correo,
        'phone' => $telefono,
        'dni' => $dni,
        'user_account' => $cuenta,
        'average' => $promedio
        ]
    );

    if($valor != null){
        header('Location: listar.php');
    }

}else {
    echo "Faltan campos obligatorios";
}



// var_dump($nombre);

// isset para decir si esta definido una variable

// if($nombre != ""){
//     echo "si pasa algo";
// }else {
//     echo "Pues pasa otra cosa";
// }