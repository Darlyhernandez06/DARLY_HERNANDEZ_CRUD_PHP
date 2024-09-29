<?php

require_once(__DIR__."/../../LIBS/Database.php");

require_once(__DIR__."/../../LIBS/Modelo.php");

include_once("../../CLASES/Aprendiz.php");

$database = new Database();

$connection = $database->getConnection($database);

$aprendiz = new Aprendiz($connection);

//listar los usuarios

$lista = $aprendiz -> getAll();

?>

<table border= 2>
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha Nacimiento</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Dni</th>
        <th>Cuenta</th>
        <th>Promedio</th>
        <th>Acciones</th>
    </thead>
    
    <thoby>
        <?php
        for ( $i= 0; $i < count($lista); $i++){
            ?>   
            <tr>
                <td><?= $lista[$i]["id"]?></td>
                <td><?= $lista[$i]["first_name"]?></td>
                <td><?= $lista[$i]["lats_name"]?></td>
                <td><?= $lista[$i]["birthdate"]?></td>
                <td><?= $lista[$i]["email"]?></td>
                <td><?= $lista[$i]["phone"]?></td>
                <td><?= $lista[$i]["dni"]?></td>
                <td><?= $lista[$i]["user_account"]?></td>
                <td><?= $lista[$i]["average"]?></td>
                <td>
                    <div> 
                        <a href="editar.php?id=<?=$lista[$i]["id"]?>">Editar</a>
                        <form action="eliminar.php" method="post"> 
                            <input type="hidden" name="id" value="<?= $lista[$i]["id"]?>">
                            <button type ="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </thoby>
</table>

<?php
// for ( $i= 0; $i < count($lista); $i++){
//     echo "<pre>";
//     print_r($lista[$i]);
//     echo "</pre>";
// }


// echo "<pre>";
// print_r($lista );
// echo "</pre>";

?>