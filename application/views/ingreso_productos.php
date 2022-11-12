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
            <title>Ingreso producto</title>
            <script type="text/javascript">
                function ingreso_producto()
                {
                    var nom=$('#nom').val();
                    var tipo_prod=$('#tipo_prod').val();
                    var precio=$('#precio').val();
                    var cod_prod=$("#cod_prod").val();
                    if(nom=="")
                    {
                        alert('ingrese nombre')
                    }
                    else if(tipo_prod=="")
                    {
                        alert("ingrese tipo de producto")
                    }
                    else if(precio=="")
                    {
                        alert("ingrese precio")
                    }
                    else if(cod_prod=="")
                    {
                        alert("ingrese el codigo del producto")
                    }
                    else
                    {
                        datos_prod="nom="+nom+"&"+"tipo_prod="+tipo_prod+"&"+"precio="+precio+"&"+"cod_prod="+cod_prod
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/ingreso_productos_descrip",
                            data:datos_prod,
                            cache:false,
                            dataType:"text",
                            success:function(response){
                               //alert(datos)
                                alert("producto ingresado");
                                $('input[type="text"]').val('');
                                $('input[type="number"]').val('');

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
                    <div align="center" class="panel-heading"><h2>ingreso productos<h2></div>
                </div>
                    <div class="panel-body">
                        <form id="ingreso" method="post" action="" >
                            <div class="row">
                                <div class="col-sm-4">
                                    Nombre:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="nom" name="nom" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    Tipo producto:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="tipo_prod" name="tipo_prod"class="form-control" />
                                </div>
                                <div class="row">    
                                    <div class="col-sm-4">
                                        Precio:
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" id="precio" name="precio" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-sm-4">
                                        Codigo producto:
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" id="cod_prod" name="cod_prod" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary" onclick="ingreso_producto()" >Ingreso producto</button>
                            </div>
                        </form>               
                    </div>
                </div>
            </div>
            
        </body>