<?php

require_once(__DIR__."/../../LIBS/Database.php");

require_once(__DIR__."/../../LIBS/Modelo.php");

include_once("../../CLASES/Aprendiz.php");

$database = new Database();

$connection = $database->getConnection($database);

$aprendiz = new Aprendiz($connection);

$id = $_REQUEST["id"];

$usuario = $aprendiz -> getById($id);

// print_r($usuario);

?>


<div class="formulario">
    <form action="actualizar.php" method="post">

        <input type="hidden" name="id" value="<?= $usuario["id"]?>"/> 

        <div>
            <label for="first_name">Nombre</label>
            <input type="text" name="first_name" id="first_name" value="<?= $usuario["first_name"]?>">
        </div>

        <div>
            <label for="lats_name">Apellido</label>
            <input type="text" name="lats_name" id="lats_name"  value="<?= $usuario["lats_name"]?>">
        </div>

        <div>
            <label for="birthdate">Fecha Nacimiento</label>
            <input type="date" name="birthdate" id="birthdate"  value="<?= $usuario["birthdate"]?>">
        </div>

        <div>
            <label for="email">Correo</label>
            <input type="text" name="email" id="email" value="<?= $usuario["email"]?>">
        </div>

        <div>
            <label for="phone">Telefono</label>
            <input type="number" name="phone" id="phone" value="<?= $usuario["phone"]?>">
        </div>

        <div>
            <label for="dni">Dni</label>
            <input type="number" name="dni" id="dni"  value="<?= $usuario["dni"]?>" readonly>
        </div>

        <div>
            <label for="user_account">Cuenta</label>
            <input type="text" name="user_account" id="user_account" value="<?= $usuario["user_account"]?>">
        </div>

        <div>
            <label for="average">Promedio</label>
            <input type="text" name="average" id="average" value="<?= $usuario["average"]?>">
        </div>

        <button type="submit" class="boton">Actualizar</button>
    </form>
</div>
