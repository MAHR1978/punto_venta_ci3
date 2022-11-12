<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Models_punto_venta');
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('test_pci3');
		$this->load->view('login');
	}
	public function verifica_user()
	{
		$us=$this->input->post("usuario");
		$clave=$this->input->post("clave");
		$datos_in=$this->Models_punto_venta->verifica_dat_user($us,$clave);
		$res_datos_in=count($datos_in);
		echo $res_datos_in;
		//$this->load->view('inicio');
	}
	public function inicio()
	{
		$this->load->view('inicio');
	} 
	
	public function inserta_datos()
	{
		$nombre=$this->input->post("nombre");
		$ap_p=$this->input->post("ap_p");
		$ap_m=$this->input->post("ap_m");
		$usuario=$this->input->post("usuario");
		$clave=$this->input->post("password");
		$this->Models_punto_venta->inserta_datos_punto_venta($nombre,$ap_p,$ap_m,$usuario,$clave);
	}
	public function ingreso_productos()
	{
		$this->load->view('ingreso_productos');
	}
	public function cuentas()
	{
		$this->load->view('cuentas');
	}
	public function detalle_cuentas()
	{
		$detalle_c['detalle_c']=$this->Models_punto_venta->detalle_cuentas();
		$this->load->view('detalle_cuentas',$detalle_c);
	}
	public function detalle_cuentas_busqueda()
	{
		$nombre_busqueda=$this->input->post('buscar_cuenta');
		$resul_nombre_busqueda['resul_nombre_busqueda']=$this->Models_punto_venta->busqueda_cuenta($nombre_busqueda);
		//print_r($resul_nombre_busqueda);
		//$this->load->view('detalle_cuentas',$detalle_c);
		print_r($resul_nombre_busqueda);
		/*echo '<table class="table" style="">
                        <th>
                            <tr>
                                <td>nombre</td>
                                <td>tipo producto</td>
                                <td>valor producto</td>
                                <td>nombre producto</td>
                                <td>fecha operacion</td>
                            </tr>
                        </th>
                        <tbody>'.foreach($resul_nombre_busqueda as $row){.'<tr><td>'.echo $nombre=$row['nombre'];.'</td><td>'.echo $tipo_producto=$row['tipo_producto'];.'</td>
                                            <td>'.echo $valor_producto=$row['valor_producto'];.'</td>
                                            <td>'.echo $nombre_producto=$row['nombre_producto'];.'</td>
                                            <td>'.echo $fecha=$row['fecha'];.'</td>
                                        </tr>'.
                              		}.'
                            
                        </tbody>    
                    
        </table>';*/

	} 
	public function ingreso_productos_descrip()
	{
		$nom=$this->input->post("nom");
		$tipo_prod=$this->input->post("tipo_prod");
		$precio=$this->input->post("precio");
		$cod_prod=$this->input->post("cod_prod");
		$this->Models_punto_venta->inserta_productos($nom,$tipo_prod,$precio,$cod_prod);
	}
	public function ingreso_cuentas()
	{
		$nomb=$this->input->post("nomb");
		$nom_prod=$this->input->post("nom_prod");
		$tipo_prod=$this->input->post("tipo_prod");
		$val_prod=$this->input->post("val_prod");
		$fecha=$this->input->post("fecha");
		$cantidad=$this->input->post("cantidad");
		$total_operacion=$val_prod * $cantidad;
		
		$this->Models_punto_venta->ingreso_datos_cuenta($nomb,$nom_prod,$tipo_prod,$val_prod,$fecha,$cantidad,$total_operacion);
	}
	public function ventas()
	{		
		$tipo_p=$this->input->post('tipo_producto');
		$tipo_prod['tipo_prod']=$this->Models_punto_venta->tipo_producto($tipo_p);
			
			foreach ($tipo_prod['tipo_prod'] as $row)
			{
				$nombre_prod=$row['nombre'];
				$precio_prod=$row['precio'];
					echo '<option value='.$precio_prod.'>'.$nombre_prod.'</option>';
			}
		//unset($tipo_prod['tipo_prod']);
		
			
		$this->load->view('venta');
		
	}
}
