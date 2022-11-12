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
	public function costos()
	{
		$this->load->view('costos');
	}
	public function ingreso_costo()
	{
		$this->load->view('ingreso_costo');
	}
	public function ingreso_insumo()
	{
		$this->load->view('ingreso_insumo');
	}
	public function detalle_cuentas_busqueda()
	{
		$nombre_busqueda=$this->input->post('buscar_cuenta');
		$resul_nombre_busqueda['resul_nombre_busqueda']=$this->Models_punto_venta->busqueda_cuenta($nombre_busqueda);
		$i=1;
		foreach($resul_nombre_busqueda['resul_nombre_busqueda'] as $row)
		{	echo '<tr>';
			echo '<td>'.$nombre=$row['nombre'].'</td>';
			echo '<td>'.$tipo_producto=$row['tipo_producto'].'</td>';
			echo '<td>'.$valor_producto=$row['valor_producto'].'</td>';
			echo '<td>'.$nombre_producto=$row['nombre_producto'].'</td>';
			echo '<td>'.$fecha=$row['fecha'].'</td>';
			echo '<td>'.$cantidad=$row['cantidad'].'</td>';
			echo '<td id="t_'.$i.'" class="subtotal">'.$total_operacion=$row['total_operacion'].'</td>';
			echo '<td class="pagado">'.$pagado=$row['pagado'].'</td>';
			echo '</tr>';
		
			$i++;

		}
		//$total_deuda=$this->Models_punto_venta->total_deuda($nombre);
		//var_dump($total_deuda);
	} 
	public function pago_deuda()
	{
		$total_deuda=$this->input->post('total_deuda');
		$nombre=$this->input->post('nombre');
		$this->Models_punto_venta->actualiza_pago_deuda($total_deuda,$nombre);
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
		//$total_deuda=$total_operacion + $total_operacion;
		
		$this->Models_punto_venta->ingreso_datos_cuenta($nomb,$nom_prod,$tipo_prod,$val_prod,$fecha,$cantidad,$total_operacion);
	}
	public function ventas()
	{		
		$tipo_p=$this->input->post('tipo_producto');
		$tipo_prod['tipo_prod']=$this->Models_punto_venta->tipo_producto($tipo_p);
			//echo '<option>seleccione..</option>';
			foreach ($tipo_prod['tipo_prod'] as $row)
			{
				$nombre_prod=$row['nombre'];
				$precio_prod=$row['precio'];
					echo '<option value='.$precio_prod.'>'.$nombre_prod.'</option>';
			}
		//unset($tipo_prod['tipo_prod']);
		
			
		$this->load->view('venta');
		
	}
	public function ing_data_insumo()
	{
		$tipo_insumo=$this->input->post("tipo_insumo");
		$nombre_insumo=$this->input->post("nombre_insumo");
		$precio_insumo=$this->input->post("precio_insumo");
		$this->Models_punto_venta->ing_data_insumo($tipo_insumo,$nombre_insumo,$precio_insumo);
	}
	public function detalle_ingreso_costo()
	{
		$tipo_insumo=$this->input->post('tipo_insumo');
		$result_tipo_insumo['result_tipo_insumo']=$this->Models_punto_venta->busca_tipo_insumo($tipo_insumo);
		foreach($result_tipo_insumo['result_tipo_insumo'] as $row)
		{
			$nombre_insumo=$row['nombre_insumo'];
			$precio_insumo=$row['precio_insumo'];
			echo '<option value='.$nombre_insumo.'>'.$nombre_insumo.'</option>';
		}
		//$this->load->view('ingreso_costo',$result_tipo_insumo);
		
		//print_r($result_tipo_insumo);		
	}
	public function precio_por_ingreso_costo()
	{
		$precio_por=$this->input->post('precio_por');
		$b_precio_por['b_precio_por']=$this->Models_punto_venta->b_precio_por_ingreso_costo($precio_por);
		foreach($b_precio_por['b_precio_por'] as $row)
		{
			$precio_insumo=$row['precio_insumo'];
			echo "<input type='text' id='precio_insumo' readonly='readonly' class='form-control' value=".$precio_insumo." />";
		}
		///print_r($b_precio_por['b_precio_por']);
	}
	public function inventario()
	{
		$tipos_insumos['tipos_insumos']=$this->Models_punto_venta->busca_insumos();
		$this->load->view('inventario',$tipos_insumos);
	}
	public function lista_de_productos()
	{
		$lista_precios['lista_precios']=$this->Models_punto_venta->busca_productos();

		$this->load->view('lista_precios',$lista_precios);
	}
}
