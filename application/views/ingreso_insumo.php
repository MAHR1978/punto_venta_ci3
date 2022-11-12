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
	        
            <!--<link href="https://code.jquery.com/jquery-3.6.0.min.js" />-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <title>Ingreso insumo</title>
            <script type="text/javascript">
                function ingreso_insumo()
                {
                    var tipo_insumo=$("#t_insumo").val();
                    var nombre_insumo=$("#n_insumo").val();
                    var precio_insumo=$("#p_insumo").val();
                    var cantidad=$("#cantidad").val();
                    var precio_venta=$("#precio_venta").val();
                    if(tipo_insumo=="")
                    {
                        alert("ingrese tipo insumo")
                    }
                    else if(nombre_insumo=="")
                    {
                        alert("ingrese nombre insumo")
                    }
                    else if(precio_insumo=="")
                    {
                        alert("ingrese precio insumo") 
                    }
                    else if(cantidad=="")
                    {
                        alert("ingrese cantidad") 
                    }
                    else if(precio_venta=="")
                    {
                        alert("ingrese precio_venta") 
                    }
                    else
                    {
                        var data_insumo="tipo_insumo="+tipo_insumo+"&"+"nombre_insumo="+nombre_insumo+"&"+"precio_insumo="+precio_insumo+"&"+"cantidad="+cantidad+"&"+"precio_venta="+precio_venta
                        //alert(data_insumo)
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/ing_data_insumo",
                            data:data_insumo,
                            cache:false,
                            success:function(data){
                                $('input[type="text"]').val('');
                                $('input[type="number"]').val('');
                                alert("dato ingresado correctamente")
                                
                            },    
                            error: function(error){
                                ///alert(datos)
                                alert("error:"+ error);
                                    //return true;
                            }
                        });
                    }
                }
            </script>   
        </head>
        <body>
        <div class="container">
            <div class="panel panel-default">
                <div align="center" class="panel-heading"><h2>Ingreso insumo<h2>
                </div>
            </div>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inventario">inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_de_productos">lista de precios</a>
                </li>

                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>-->
            </ul>
           <!-- <nav class="navbar navbar-light bg-light">
                <a class="" href="inventario">inventario</a>
                <a class="" href="lista_de_productos">lista de precios</a>
            </nav>--> 
           
                <div class="row">
                    <div class="col-sm-4">
                        Tipo insumo
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="t_insumo" name="t_insumo" class="form-control" />
                    </div>
                </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Nombre insumo
                        </div>
                        <div class="col-sm-4">
                            <input type="text" id="n_insumo" name="n_insumo" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Precio insumo
                        </div>
                        <div class="col-sm-4">
                            <input type="number" id="p_insumo" name="p_insumo" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Precio venta
                        </div>
                        <div class="col-sm-4">
                            <input type="number" id="precio_venta" name="precio_venta" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            cantidad
                        </div>
                        <div class="col-sm-4">
                            <input type="number" id="cantidad" name="cantidad" class="form-control" />
                        </div>
                    </div>      
                    <div class="row">
                    <button type="button" class="btn btn-primary" onclick="ingreso_insumo()" >Ingresar insumo</button>
                    </div>   
                </div>
            </div>        
        </body> 