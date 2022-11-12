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
	        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" >
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            
            <title>inventario</title>
            
            <script type="text/javascript">
                $(document).ready( function () {
                   var table= $('#detalle_inventario').DataTable();
                    $('.editar_inv').on('click',function(){
                    var valores="";
                    var parametros=[];
                        // Obtenemos todos los valores contenidos en los <td> de la fila
                        // seleccionada
                        $(this).parents("tr").find("#id").each(function(index,element){
                          valores+=$(this).html()+"\n";   
                        });
                       var datastring="id="+valores;
                       //alert(datastring)
                       $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/editar_inventario",
                            data:datastring,
                            cache:false,
                            dataType:"json",
                            success:function(response){
                                alert(response.id)

                                //window.location.href = "https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/editar_inventario"
                               // alert(response)
                                //$("#ver_editar_inventario").html(response);
                              ////$("#ver_editar_inventario").css('display','block');

                            },
                            error:function(e)
                            {

                            }
                        

                       })
                    });
                })
                
            </script>
        </head>
        <body>
            <div class="panel panel-default">
                <div align="center" class="panel-heading">
                    <h2>inventario<h2>
                    </div>
            </div>
            <div class="container">
                <div class="table-responsive"> 
                        <table class="table" style="" id="detalle_inventario">
                            <thead>    
                                <tr>
                                    <th>id</th>
                                    <th>tipo insumo</th>
                                    <th>nombre insumo</th>
                                    <th>cantidad</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>                               
                            <tbody>
                                <?php
                                        foreach($tipos_insumos as $row)
                                        {  ?>  
                                            <tr>
                                                <td id="id"><?php echo $id=$row['id']; ?></td>
                                                <td><?php echo $tipo_insumo=$row['tipo_insumo']; ?></td>
                                                <td><?php echo $nombre_insumo=$row['nombre_insumo']; ?></td>
                                                <td><input id="cantidad" type="text" readonly="readonly" class="form-control" value="<?php echo $cantidad=$row['cantidad']; ?>" /></td>
                                                <td><a href="" id="" class="btn btn-lg btn-danger form-control editar_inv" >editar</a></td>
                                            </tr>
                                            
                                <?php  
                                        }
                                        
                                    $this->load->library('ciqrcode');

                                    $params['data'] = 'https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/lista_de_productos';
                                    $params['size'] = 10;
                                    $params['savename'] = FCPATH.'tes_6.png';
                                    $this->ciqrcode->generate($params);
                                    //print_r($params);
                                ?>
                               
                            </tbody>    
                        
                        </table>
                    </div>
                    
            </div>
            
           
        </body>
        