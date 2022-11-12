<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    header('Access-Control-Allow-Origin: *');
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
	        <!-- Required meta tags -->
	        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
	        <!-- Bootstrap CSS -->
	        <link href="https://code.jquery.com/jquery-3.6.0.min.js" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <title>Inicio</title>
            <script type="text/javascript">
            </script>
        </head>
<div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>resultado busqueda<h2>

                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            nombre:
                        </div>
                        <div class="col-sm-4">
                            <input type="text" id="b_nombre" name="b_nombre" class="form-control" />
                        </div>

                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary" onclick="buscar_cuenta()" >buscar cuenta</button>
                    </div>
                    <table class="table" style="">
                        <th>
                            <tr>
                                <td>nombre</td>
                                <td>tipo producto</td>
                                <td>valor producto</td>
                                <td>nombre producto</td>
                                <td>fecha operacion</td>
                            </tr>
                        </th>
                        <tbody>
                           
                                <?php
                                    foreach($resul_nombre_busqueda as $row)
                                    {  ?>  
                                        <tr>
                                            <td><?php echo $nombre=$row['nombre']; ?></td>
                                            <td><?php echo $tipo_producto=$row['tipo_producto']; ?></td>
                                            <td><?php echo $valor_producto=$row['valor_producto']; ?></td>
                                            <td><?php echo $nombre_producto=$row['nombre_producto']; ?></td>
                                            <td><?php echo $fecha=$row['fecha']; ?></td>
                                        </tr>
                            <?php   }
                                    ?>
                            
                        </tbody>    
                    
                    </table>
                </div>
            </div>