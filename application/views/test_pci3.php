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
            <title>Prueba Codeigniter</title>
            <script type="text/javascript">
                function prueba(){		
		            var nombre=$("#nombre").val();
		            var ap_p=$("#ap_p").val();
                    var ap_m=$("#ap_m").val();
                    var usuario=$("#users").val();
                    var password=$("#pass").val();
		            //alert(usuario)
                    if(nombre=="")
                    {
                        alert("debe ingresar nombre")
                    }
                    else if(ap_p=="")
                    {
                        alert("debe ingresar apellido paterno")
                    }
                    else if(ap_m=="")
                    {
                        alert("debe ingresar apellido materno")
                    }
                    else if(usuario=="")
                    {
                        alert("debe ingresar usuario")
                    }
                    else if(password=="")
                    {
                        alert("debe ingresar password")
                    }
                    else
                    {
                        var datos="nombre="+nombre+"&"+"ap_p="+ap_p+"&"+"ap_m="+ap_m+"&"+"usuario="+usuario+"&"+"password="+password
                        ///alert(datos)
                        $.ajax({
                            type:"POST",
                            url:"https://www.desarrolloapp.cl/punto_venta_ci3/index.php/welcome/inserta_datos",
                            data:datos,
                            cache:false,
                            dataType:"text",
                            success:function(response){
                               //alert(datos)
                                alert("Success: " + response);

                            },    
                            error: function(error){
                                ///alert(datos)
                                alert("error:"+ error);
                                    //return true;
                            }
                        });
                    }
		/*var datos=$("#ingreso").serialize();
		$.each(datos, function(i, field){
			//alert(field.name + ":" + field.value + " ");*/
			/*if (field.value==""){
				alert("debe ingresar todos los datos")
			}
			else{*/
				//var datos=field.name + ":" + field.value + " ";
				//alert(datos)
                //}
			/*(field.name + ":" + field.value + " ");*/	
            //alert(datos);
        }
        </script>
    </head>
    <!--<body>
        <div id="container">
            <h1>Welcome to Punto venta</h1>
                <div id="body">
                </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
            
        </div>
    </body>-->
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div align="center" class="panel-heading"><h2>Formulario de ingreso<h2></div>
                    <div class="panel-body">
                        <form id="ingreso" method="post" action="inserta_datos" >
                            <div class="row">
                                <div class="col-sm-2">
                                    Nombre:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="nombre" name="nombre" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    Apellido Paterno:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="ap_p" name="ap_p"class="form-control" />
                                </div>
                                <div class="col-sm-2">
                                    Apellido Materno:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="ap_m" name="ap_m" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    usuario:
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="users" name="usuario" class="form-control" />
                                </div>
                                <div class="col-sm-2">
                                    password:						
                                </div>
                                <div class="col-sm-4">
                                    <input type="password" id="pass" name="password" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-primary" onclick="prueba()" >enviar</button>
                            </div>
                        </form>
                    </div>
            </div>	
        </div>	
  </body>
</html>