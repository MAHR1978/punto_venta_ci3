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
	        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
            <script src="https://www.desarrolloapp.cl/punto_venta_ci3/assets/js/jquery.js" type="text/javascript"></script>
            <title>ventas</title>
            <script type="text/javascript">
                $(document).ready(function(){
                    var cont=0;
                    $("#tipo_producto").change(function(){
                        $("#ventas_pendientes").css('display','none');
					    $('p').html("");
                        var tipo_producto=$("#tipo_producto option:selected").text();
					    dato_prod_ven="tipo_producto="+tipo_producto;
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/ventas",
                            data:dato_prod_ven,
                            cache:false,
                            success:function(data){
                                $("#producto_final").html(data);
                                var tipo_producto=$("#tipo_producto option:selected").text();
                                $("#producto_final").change(function(){
                                    var nombre_producto=$("#producto_final option:selected").text();
                                    var precio_producto="p_tipo_prod="+tipo_producto+"&"+"p_nom_producto="+nombre_producto;
                                    $.ajax({
                                        type:"POST",
                                        url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/detalle_precio_producto",
                                        data:precio_producto,
                                        cache:false,
                                        success:function(data){
                                            var precio_ref=data;
                                                if(precio_ref=="")
                                                {
                                                    //alert(nombre_producto);
                                                }
                                                else if(nombre_producto!=nombre_producto)
                                                {
                                                    //alert(precio_ref);
                                                    $('p').html("");
                                                    
                                                    
                                                }
                                                else
                                                {
                                                    cont=parseInt(cont)+1;
                                                    if(cont>1)
                                                    {
                                                        
                                                    }
                                                    else
                                                    {   //alert(cont)
                                                        $('p').removeAttr('style');
                                                        $('.boton').removeAttr('style');
                                                        $('p').append('<input type="text" id="precio_refe" class="form-control" readonly value='+precio_ref+' />');
                                                    }                                                    
                                                }
                                        },
                                        error:function()
                                        {

                                        }
                                    })

                                })
                            },    
                            error: function(error)
                            {                                
                                alert("error:"+ error);
                            }
                        });
                    })                    
                    $("#agregar_venta").click(function(){
                        var precio=$("#precio_refe").val();
                        var tipo_producto=$("#tipo_producto option:selected").text();
                        var nombre_producto=$("#producto_final option:selected").val();
                        var detalle_venta="precio="+precio+"&"+"tipo_producto="+tipo_producto+"&"+"nombre_producto="+nombre_producto
                        //alert(detalle_venta);
                        //$("#cantidad").val(parseInt($("#cantidad").val()) + 1);
                        //$(".demo").html("<input type='text' id='cantidad' value='1'/><input type='text' value="+tipo_producto+" /><input type='text' value="+nombre_producto+" /> <input type='text' value="+precio+" />");
                        //$('p').html("");
                        //$('p').attr("style", "display:none");
                        //location.reload();
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/total_Venta",
                            data:detalle_venta,
                            cache:false,
                            success:function(data){
                               // alert(data);
                                //var precio_ref=data;
                                //alert(precio_ref);
                                //$(".demo").html(precio_ref);
                               //location.reload();
                               $.ajax({
                                    type:"POST",
                                    url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/det_venta",
                                    data:'',
                                    cache:false,
                                    success:function(data){
                                        //alert(data);
                                        $(".deta_venta").html(data);
                                    },
                                    error:function(e)
                                    {

                                    }
                               })
                            },
                            error:function()
                            {

                            }
                        })

                        
                    })
                     $("#finalizar_venta").click(function(){
                        //alert("por aki");
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/finalizar_venta",
                            data:'',
                            cache:false,
                            success:function(data){
                                //alert(data);
                                $(".t_venta").html(data);
                                $(".f_v").removeAttr('style');
                            },
                            error:function(e)
                            {

                            }
                        })
                     })
                    $("#f_v").click(function(){
                        var f_v=$("#total").val();
                        alert(f_v)
                        var fi_v='total_venta='+f_v
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/fin_venta",
                            data:fi_v,
                            cache:false,
                            success:function(data){
                              /*alert('venta finalizada');
                                setTimeout(function(){
                                    location.reload();
                                }, 500);
                                //$(".t_venta").html(data);
                                //$(".f_v").removeAttr('style');*/
                            },
                            error:function(e)
                            {

                            }
                        })
                    })
                    $("#ventas_pendientes").click(function(){
                        alert("aki siii !!");
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/venta_pendiente",
                            data:'',
                            cache:false,
                            success:function(data){
                                //alert(data);
								$(".deta_venta").html(data);
                            },
                            error:function(e)
                            {

                            }
                        })
                    });   
                });
               
                function precio(precio_ref)
                {
                    alert(precio_ref)
                    $('p').removeAttr('style');
                    $('.boton').removeAttr('style');
                    $('p').append('<input type="text" id="precio_refe" class="form-control" readonly value='+precio_ref+' />');
                    //precio_ref="";                        
                } 
                /*function agregar_venta()
                {
                   var precio=$("#precio_refe").val();
                   var tipo_producto=$("#tipo_producto option:selected").text();
                   var nombre_producto=$("#producto_final option:selected").text();
                   //$("#proc_venta").append("<input type='text' value="+tipo_producto+"> ")
                   alert(tipo_producto)
                   document.getElementById('proc_venta').innerHTML="hola mundo !!!!";
                   //document.getElementById("proc_venta").innerHTML("<input type='text' value="+tipo_producto+"> ");
                }*/              
            </script>
        </head>
        <body>
           
            <div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>Descripcion venta<h2></div>
                </div>
                <div class="panel-body">
                <div class="card card-body"> 
                    <form id="ingreso" method="post" action="" >
                        <div class="row">
                            <div class="col-sm-4">
                                Tipo producto:
                            </div>
                            <div class="col-sm-4">
                                <select id="tipo_producto" name="tipo_producto" style="" class="form-control">
							        <option></option>
                                    <option value="sandwich">sandwich</option>
                                    <option value="bebida">bebida</option>
                                    <option value="jugo">jugo</option>
                                    <option value="dulce">dulce</option>
                                    <option value="frutos_secos">frutos secos</option>
                                    <option value="aguas">aguas</option>
						        </select>
                            </div>
                            <div class="col-sm-2">
                                <button id="ventas_pendientes" class="btn btn-primary">ventas pendientes</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                producto:
                            </div>
                            <div class="col-sm-4">
                                <select id="producto_final" name="producto_final" style="" class="form-control">
                                    <option></option>
                                </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                
                            </div>
                            
                            <div id="precio_ref" >
                                <p style="display:none;">Precio: </p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-2">
                                            <button id="agregar_venta" style="display:none" type="button" class="btn btn-primary boton" onclick="" >agregar venta</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button id="finalizar_venta" style="display:none" type="button" class="btn btn-primary boton" onclick="" >finalizar venta</button>
                                        </div>
                                    </div>                               
                            </div>
                            <div>
                                <table class="table">
                                    <th>
                                        <tr>
                                            <td>producto</td>
                                            <td>precio</td>
                                            <td>tipo producto</td>
                                            <td>fecha</td>
                                            <td>eliminar</td>
                                        </tr>
                                    </th>
                                    <tbody class="deta_venta">
                                    </tbody>
                                </table>
                            </div>
                            <div class="t_venta">                                
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <button id="f_v" type="button" style="display:none;" class="btn btn-primary f_v">finalizar</button>
                                    <button id="v" type="button" style="display:none;" class="btn btn-primary f_v">volver</button>
                                </div>
                            </div>    
                        </div>
                        <?php 
                        if(empty($d_venta))
                        {

                        }
                        else
                        {//print_r($d_venta);
                        }
                         ?>
                        <!--<iframe src="https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/total_Venta">-->
                            <div class="demo">
                               
                            </div>
                        <!--</iframe>-->
                    </form>
                </div>
            </div>
            </div>
                   
        </body> 