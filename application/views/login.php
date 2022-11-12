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
            <title>Login de usuario</title>
            <script type="text/javascript">
                function ingreso()
                {
                   var usuario=$("#us").val();
                   var clave=$("#clave").val();
                   if(usuario=="")
                   {
                       alert("Debe ingresar un usuario");
                   }
                   else if(clave=="")
                   {
                       alert("debe ingresar una contraseña")
                   }
                   else
                   {
                       datastring="usuario="+usuario+"&"+"clave="+clave
                      $.ajax({
                          type:"POST",
                          url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/verifica_user",
                          data:datastring,
                          cache:false,
                            dataType:"text",
                            success:function(response){
                               //alert(datos)
                               // alert("Success: " + response);
                                if(response==0)
		                        {
			                        alert("el usuario no existe");
		                        }
		                        else if(response==1)
		                        {
			                        alert("usuario correcto");
                                    window.location.href='https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/inicio';        
                                   // $this->load->view('inicio');
		                        }

                            },    
                            error: function(error){
                                ///alert(datos)
                                alert("error:"+ error);
                                    //return true;
                            }

                      })
                   }
                }
            </script>
        </head>
        <body>
            <div class="container">
                <div class="panel panel-default">
                    <div align="center" class="panel-heading"><h2>Login<h2></div>
                </div>
                <div class="card card-body"> 
                    <form id="" method="post" action="" >
                        <div align="center" class="row">
                        <div class="col-sm-2">
                        </div>    
                            <div class="col-sm-2">
                                Usuario:
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="us" name="us" class="form-control" />
                            </div>
                        </div>
                        <div align="center" class="row">
                        <div class="col-sm-2">
                        </div>    
                            <div class="col-sm-2">
                                Clave:
                            </div>
                            <div class="col-sm-4">
                                <input type="password" id="clave" name="clave" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" class="btn btn-primary" onclick="ingreso()" >ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>    