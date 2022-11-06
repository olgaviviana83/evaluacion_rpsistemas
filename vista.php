<?php
//var_dump($personas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sorteo</title>
</head>
<body>
<h1>Total de registros en la base de datos</h1>
    <h2>Participates: </h2>
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

        <!-- espacio para insertar registros -->
        <br><br>
        <form action="" method="get">
        <input type="text" placeholder="DNI" name="dni" autocomplete="off"> <br>
        <input type= "text" placeholder="Nombre y apellido: " name= "nombre" autocomplete="off"> <br>
        <input type="submit" value="Guardar"><br>
        <input type="hidden" name="metodo" value="guardar">
        </form>
        <!-- contenido -->
        <br><br>
        <form action="" method="get">
        <input type= "text" value="Sorteo no importar orden" name= "tipo" readonly="readonly" autocomplete="off">
        <input type= "text" placeholder="Nro de ganadores:" name= "nroganadores" autocomplete="off">
        <input type="submit" value="Comenzar sorteo">
        <input type="hidden" name="metodo" value="noimportaorden">
        </form>
        <!-- contenido -->
        <br><br>
        <form action="" method="get">
        <input type= "text" value="Sorteo si importar orden" name= "tipo" readonly="readonly" autocomplete="off">
        <input type= "text" placeholder="Nro de ganadores:" name= "nroganadores" autocomplete="off">
        <input type="submit" value="Comenzar sorteo">
        <input type="hidden" name="metodo" value="siimportaorden">
        </form>
    </div>
</body>
</html>
