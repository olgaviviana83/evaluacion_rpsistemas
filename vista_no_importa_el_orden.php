<?php
//var_dump($personas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>
    <h1>Sorteo no importa el orden de ganadores </h1>
    <h2>Ganadores: </h2>
    <br><br>
    <div >
        <!-- contenido -->
        <tr>
            <td>ID<td>
            <td>DNI<td>
            <td>NOMBRE Y APELLIDO<td>
        </tr>
        
        <tbody>
        <!-- loop para mostrar todos los datos -->
        <?php
            if(!empty($personas)):
            foreach($personas as $quey => $value)
                foreach($value as $persona):
                    ?>
                    <br>
                     <tr>
                        <td> <?php echo $persona["id"] ?> <td>
                        <td> <?php echo $persona["dni"] ?> <td>
                        <td> <?php echo $persona["nombreyapellido"] ?> <td>
                        </tr>
                    <?php
                 endforeach;
                else: echo "Tabla vacia"; endif;
        ?>
        </tbody>

    </div>
</body>
</html>
