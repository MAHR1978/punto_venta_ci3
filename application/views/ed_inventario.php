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
            
            <title>editar inventario</title>
        </head>
    <body>
        <p>el array es</p>
        <?php 
            
            //var_dump($des_inv);
           /* if(!empty($des_inv))
		    {   
			    echo "vacio";
			}
            else
            {
                foreach($des_inv as $row)
                {
                    $id=$row['id'];
                    echo $id;
                }
            }*/
           
        ?>
        <div id="ver_editar_inventario" style="">
            <table id="">
                <tr>
                    <th>id</th>
                    <th>tipo insumo</th>
                    <th>nombre insumo</th>
                    <th>precio insumo</th>
                    <th>cantidad</th>
                    <th>precio venta</th>

                <tr>
                <tbody id="editar_inventario">

                </tbody> 
            </table>
        </div>
    </body>