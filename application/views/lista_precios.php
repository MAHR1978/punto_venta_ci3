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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
            <script src="https://www.desarrolloapp.cl/punto_venta_ci3/assets/js/jquery.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <title>inventario</title>
            <script type="text/javascript">
                $(document).ready( function () {
                $('.detalle_productos').DataTable({
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"},
                    "paging": false,                    
                });
            } );
            </script>
            </head>
        <body>
            <div class="panel panel-default">
                <div align="center" class="panel-heading"><h2>Lista de precios<h2>
                </div>
            </div>
            <div class="container">
            <div class="panel panel-success">
                    <p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Sandwich
                            </a>
                        </div>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                        <div class="table-responsive"> 
                            <table class="table detalle_productos" style="" id="">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        //print_r($lista_precios);
                                        foreach($lista_precios as $row)
                                        {
                                            if($row['tipo_producto']=='sandwich')
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['nombre'];?></td>
                                                    <td><?php echo $row['precio'];?></td>
                                                </tr>    

                                <?php       }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    <p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExampleb" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Bebidas
                            </a>
                        </div>    
                    </p>
                    <div class="collapse" id="collapseExampleb">
                        <div class="card card-body">        
                            <div class="table-responsive"> 
                                <table class="table detalle_productos" style="" id="">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            //print_r($lista_precios);
                                            foreach($lista_precios as $row)
                                            {
                                                if($row['tipo_producto']=='bebida')
                                                {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['nombre'];?></td>
                                                        <td><?php echo $row['precio'];?></td>
                                                    </tr>    

                                    <?php       }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExamplej" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Jugos
                            </a>
                        </div>    
                    </p>
                    <div class="collapse" id="collapseExamplej">
                        <div class="card card-body">  
                            <div class="table-responsive"> 
                                <table class="table detalle_productos" style="" id="detalle_inventario">
                                    <thead>                               
                                        <tr>
                                            <th>Producto</th>
                                            <th>precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            //print_r($lista_precios);
                                            foreach($lista_precios as $row)
                                            {
                                                if($row['tipo_producto']=='jugo')
                                                {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['nombre'];?></td>
                                                        <td><?php echo $row['precio'];?></td>
                                                    </tr>    

                                        <?php   }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExamplea" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Aguas
                        </a>  
                    </div>     
                    <div class="collapse" id="collapseExamplea">
                        <div class="card card-body">                                
                            <div class="table-responsive"> 
                                <table class="table detalle_productos" style="" id="detalle_inventario">
                                    <thead>
                                        
                                        <tr>
                                            <th>Producto</th>
                                            <th>precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            //print_r($lista_precios);
                                            foreach($lista_precios as $row)
                                            {
                                                if($row['tipo_producto']=='aguas')
                                                {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['nombre'];?></td>
                                                        <td><?php echo $row['precio'];?></td>
                                                    </tr>    

                                    <?php       }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>    
            </div>
        </body>