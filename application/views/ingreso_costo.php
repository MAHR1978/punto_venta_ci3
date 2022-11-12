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
                $(document).ready(function(){
                    $("#t_insumo").change(function(){
                        var tipo_insumo=$("#t_insumo option:selected").val();
                        var dato_ingreso_costo="tipo_insumo="+tipo_insumo
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/detalle_ingreso_costo",
                            data:dato_ingreso_costo,
                            cache:false,
                            success:function(data){
                               $("#N_insumo").html(data);
                               $("#N_insumo").change(function(){
                                    var precio_por=$("#N_insumo option:selected").text();
                                    //alert(precio_por)
                                    var dato_p_p_ingreso_costo="precio_por="+precio_por
                                    $.ajax({
                                        type:"POST",
                                        url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/precio_por_ingreso_costo",
                                        data:dato_p_p_ingreso_costo,
                                        cache:false,
                                        success:function(data){
                                           //alert(data)
                                            $("#precio_por").html(data);
                                            $("#total_k").change(function(){
                                                var precio_insumo=$("#precio_insumo").val()
                                                var total_kilos=$("#total_k").val();
                                                var total_compra= precio_insumo * total_kilos
                                                alert(precio_insumo+"_"+total_kilos+"_"+total_compra)
                                            })
                                        },
                                        error: function(error){
                                            ///alert(datos)
                                            alert("error:"+ error);
                                            //return true;
                                        }
                                    });
                                });
                            },    
                            error: function(error){
                                ///alert(datos)
                                alert("error:"+ error);
                                    //return true;
                            }
                        });
                    })
                })
            </script>
        </head>
        <body>
            <div class="panel panel-default">
                <div align="center" class="panel-heading"><h2>Ingreso Costo<h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        fecha:
                    </div>
                    <div class="col-sm-4">    
                        <input type="text" id="fecha" name="fecha" value="<?php  echo date('d-m-Y H:i:s');?>" class="form-control" readonly />
                    </div>
                <div class="row">
                    <div class="col-sm-4">
                        Tipo insumo
                    </div>
                    <div class="col-sm-4">
                        <select id="t_insumo" name="t_insumo" style="" class="form-control">
						    <option>Seleccione..</option>
                            <option value="pan">pan</option>
                            <option value="masas">masas</option>
                            <option value="Carne">Carne</option>
                            <option value="bebida">bebida</option>
                            <option value="jugo">jugo</option>
                            <option value="dulce">dulce</option>
                            <option value="frutos_secos">frutos secos</option>
                            <option value="abarrotes">abarrotes</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                    Nombre insumo
                    </div>
                    <div class="col-sm-4">
                        <select id="N_insumo" name="N_insumo" style="" class="form-control">
                        </select>
                    </div>
                    <div id="precio_por" style="" class="col-sm-2">
                            
                    </div>
                    <div id="" style="" class="col-sm-2">
                    1/4 KG.
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        total kilos:
                    </div>
                    <div class="col-sm-4">
                        <input type="number" id="total_k" name="total_k" class="form-control" />
                    </div>    
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Total Compra insumo:
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="t_p_in" name="t_p_in" class="form-control" />
                    </div>
                </div>

        </body>