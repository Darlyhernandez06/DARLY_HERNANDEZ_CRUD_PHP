<?php

require_once(__DIR__."/../../LIBS/Database.php");

require_once(__DIR__."/../../LIBS/Modelo.php");

include_once("../../CLASES/Aprendiz.php");

$database = new Database();

$connection = $database->getConnection($database);

$aprendiz = new Aprendiz($connection);

$id = $_REQUEST["id"];

$aprendiz -> delete($id);

header('Location: listar.php');