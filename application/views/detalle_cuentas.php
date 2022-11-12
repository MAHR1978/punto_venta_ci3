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
                function buscar_cuenta()
                {
                    var buscar_cuenta=$("#b_nombre").val()
                    if(buscar_cuenta=="")
                    {
                        alert("debe ingresar nombre !!")
                    }
                    else
                    {
                        var datos_buscar_cuenta="buscar_cuenta="+buscar_cuenta
                        alert(datos_buscar_cuenta)
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/detalle_cuentas_busqueda",
                            data:datos_buscar_cuenta,
                            cache:false,
                            dataType:"text",
                            success:function(response){
                               $("#detalle_cuenta").css('display','none');
                               $("#detalle_cuenta_busqueda").css('display','block')
                               $("#detalle_busqueda").html(response);
                               sumar()	                    
                            },    
                            error: function(error){
                                alert("error:"+ error);
                            }
                        });
                    }
                }
                function sumar(){
                    $('#suma').html('');
                    var sum=0;
                    $('.subtotal').each(function() {
                        sum += parseFloat($(this).text());                      
                    });
                    $('#suma').append('<input type="text" id="total" class="form-control" readonly="readonly" value='+sum+'>')
                    $('#paga').css('display','block');
                }
                function pagar()
                {
                    var confirmacion=confirm("esta seguro que desea pagar")
                    if(confirmacion==true)
                    {
                        var total_deuda=$('#total').val();
                       // alert(total_deuda);
                        var nombre=$('#b_nombre').val();
                        var pago_deuda="total_deuda="+total_deuda+"&"+"nombre="+nombre
                            //alert(pago_deuda)
                            $.ajax({
                                type:"POST",
                                url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/pago_deuda",
                                data:pago_deuda,
                                cache:false,
                                dataType:"text",
                                success:function(response){
                               	        alert("pago realizado")
                                        //refrech()
                                        location.reload();      
                                },    
                                error: function(error){
                                    alert("error:"+ error);
                                }
                        });
                    }
                    else
                    {
                        alert("no pago !!!")
                    }
                    /*var total_deuda=$('#total').val();
                    var nombre=$('#b_nombre').val();
                    var pago_deuda="total_deuda="+nombre+"&"+"nombre="+nombre
                    $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/pago_deuda",
                            data:pago_deuda,
                            cache:false,
                            dataType:"text",
                            success:function(response){
                               	                    
                            },    
                            error: function(error){
                                alert("error:"+ error);
                            }
                        });*/

                }
            </script>
        </head>
        <body>
            <div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>Detalle cuentas<h2>

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
                    <div class="table-responsive"> 
                        <table class="table" style="" id="detalle_cuenta">
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
                                        foreach($detalle_c as $row)
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
                <div class="container">
                    <!--<div class="row">
                        <div class="col-sm-4">
                            nombre:
                        </div>
                        <div class="col-sm-4">
                            <input type="text" id="b_nombre" name="b_nombre" class="form-control" />
                        </div>

                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary" onclick="buscar_cuenta()" >buscar cuenta</button>
                    </div>-->
                    <div class="table-responsive">
                        <table class="table" style="display:none;" id="detalle_cuenta_busqueda">
                            <th>
                                <tr>
                                    <td>nombre</td>
                                    <td>tipo producto</td>
                                    <td>valor producto</td>
                                    <td>nombre producto</td>
                                    <td>fecha operacion</td>
                                    <td>cantidad</td>
                                    <td>total operacion</td>
                                    <td>pagado</td>
                                </tr>
                            </th>
                            <tbody id="detalle_busqueda">
                            </tbody>                    
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            Total Deuda:
                        </div>
                        <div class="col-sm-4" id="suma">
                                        
                        </div>
                    </div>
                    <div class='row'>
                        <input type='button' id="paga" style="display:none;" class="btn btn-primary" value="pagar deuda" onclick="pagar()" />                
                    </div>
                </div>
            </div>