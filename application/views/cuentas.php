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
            <title>Ingreso producto</title>
            <script type="text/javascript">
                function ingreso_cuenta()
                {
                    var nomb=$("#nomb").val();
                    var nom_prod=$("#nom_prod").val();
                    var tipo_prod=$("#tipo_prod option:selected").val();
                    var val_prod=$("#val_prod").val();
                    var cantidad=$("#cantidad").val();
                    var total=$("#total").val();
                    if(nomb=="")
                    {
                        alert("debe ingresar un nombre");
                    }
                    else if(nom_prod=="")
                    {
                        alert("debe ingresar el nombre de producto")
                    }
                    else if(tipo_prod=="")
                    {
                        alert("debe ingresar el tipo de producto")
                    }
                    else if(val_prod=="")
                    {
                        alert("debe ingresar el valor del producto")
                    }
                    else if(cantidad=='')
                    {
                        alert("debe ingresar cantidad")
                    }
                    else
                    {
                        var now = moment().format(); 
                        
                        var dato_cuenta="nomb="+nomb+"&"+"nom_prod="+nom_prod+"&"+"tipo_prod="+tipo_prod+"&"+"val_prod="+val_prod+"&"+"fecha="+now+"&"+"cantidad="+cantidad+"&"+"total="+total
                        //alert(dato_cuenta);
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/ingreso_cuentas",
                            data:dato_cuenta,
                            cache:false,
                            dataType:"text",
                            success:function(response){
                               //alert(datos)
                               // alert("producto ingresado");
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
        <div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>cuentas<h2></div>
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                Nombre :
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="nomb" name="nomb" class="form-control" />
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                Tipo producto :
                            </div>
                            <div class="col-sm-4">
                                <!--<input type="text" id="tipo_prod" name="tipo_prod" class="form-control" />-->
                                
                                <select id="tipo_prod" name="tipo_prod" style="" class="form-control">
							        <option>Seleccione..</option>
                                    <option value="sandwich">sandwich</option>
                                    <option value="bebida">bebida</option>
                                    <option value="jugo">jugo</option>
                                    <option value="dulce">dulce</option>
                                    <option value="cigarros">cigarros</option>
                                    <option value="colacion">colacion</option>
                                    <option value="frutos_secos">frutos secos</option>
						        </select>
                            </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                Nombre producto :
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="nom_prod" name="nom_prod" class="form-control" />
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                Valor producto :
                            </div>
                            <div class="col-sm-4">
                                <input type="number" id="val_prod" name="val_prod" class="form-control" />
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                cantidad:
                            </div>
                            <div class="col-sm-4">
                                <input type="number" id="cantidad" name="cantidad" class="form-control" />
                            </div>    
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-4">
                                total:
                            </div>
                            <div class="col-sm-4">
                                <input type="number" id="total" name="total" class="form-control" />
                            </div>    
                        </div>-->
                        <div class="row">
                            <button type="button" class="btn btn-primary" onclick="ingreso_cuenta()" >Ingresar detalle</button>    
                        </div>
                    </div>
            </div>
    </html>
