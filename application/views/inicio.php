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
        </head>
        <body>
            <div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>Bienvenido<h2></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <a class="btn btn-primary" href="ingreso_insumo">ingreso insumo</a>
                    </div>     
                    <div class="row">   
                        <a class="btn btn-primary" href="ingreso_productos">ingreso productos</a>
                    </div>    
                        <div class="row">
                            <a class="btn btn-primary" href="ventas">venta</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary" href="cuentas">Cuentas</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary" href="detalle_cuentas">detalle cuentas</a>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary" href="Costos">Costos</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </body>  