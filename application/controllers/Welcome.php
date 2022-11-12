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
		$tipo_prod['tipo_prod']=array();	
		$tipo_p=$this->input->post('tipo_producto');
		$tipo_prod['tipo_prod']=$this->Models_punto_venta->tipo_producto($tipo_p);
			//echo '<option>seleccione..</option>';
			$i=1;
			foreach ($tipo_prod['tipo_prod'] as $row)
			{
				$nombre_prod=$row['nombre'];
				$nom_producto=str_replace(" ","-",$nombre_prod);
				//$precio_prod=$row['precio'];
					echo '<option value='.$nom_producto.'>'.$nombre_prod.'</option>';
					//$i++;
					//echo $i;
					//print_r($tipo_prod['tipo_prod']);
			}			
		$this->load->view('venta');
		
	}
	public function ing_data_insumo()
	{
		$tipo_insumo=$this->input->post("tipo_insumo");
		$nombre_insumo=$this->input->post("nombre_insumo");
		$precio_insumo=$this->input->post("precio_insumo");
		$cantidad=$this->input->post("cantidad");
		$precio_venta=$this->input->post("precio_venta");
		$this->Models_punto_venta->ing_data_insumo($tipo_insumo,$nombre_insumo,$precio_insumo,$cantidad,$precio_venta);
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


	public function editar_inventario()
	{
		$id=$this->input->post('id');
		$des_inv=$this->Models_punto_venta->editar_inventario($id);
		if(empty($des_inv))
		{
			echo "vacio";
			
		}
		else
		{
			
				echo json_encode($des_inv);
				//print_r($array);
			//$this->load->view('ed_inventario');
		}
		print_r($des_inv);
		/*foreach($des_inv['des_inv'] as $row)
		{	echo '<tr>';
			echo '<td>'.$id=$row['id'].'</td>';
			echo '<td>'.$tipo_insumo=$row['tipo_insumo'].'</td>';
			echo '<td>'.$nombre_insumo=$row['nombre_insumo'].'</td>';
			echo '<td>'.$precio_insumo=$row['precio_insumo'].'</td>';
			echo '<td>'.$cantidad=$row['cantidad'].'</td>';
			echo '<td>'.$precio_venta=$row['precio_venta'].'</td>';
			echo '</tr>';
		
			//$i++;
		}*/
		//print_r($des_inv['des_inv']);
		//$this->load->view('editar_inventario',$des_inv);
		
	
	}
	public function detalle_precio_producto()
	{
		$p_tipo_prod=$this->input->post('p_tipo_prod');
		$p_nom_producto=$this->input->post('p_nom_producto');
		//echo $p_nom_producto;
		$detalle_precio_venta=array();
		$detalle_precio_venta=$this->Models_punto_venta->detalle_precio_venta($p_tipo_prod,$p_nom_producto);
		//echo $detalle_precio_venta;
		$d_p_v=[
			'p_nom_producto'=>$p_nom_producto,
			//'detalle_precio_venta'=>$detalle_precio_venta
		];
		 //print_r($d_p_v);
		//print_r($detalle_precio_venta);
		/*foreach($detalle_precio_venta['detalle_precio_venta'] as $row)
		{
			$precio=$row['precio'];
			echo $precio;
		}*/
	}
	public function det_venta()
	{
		$d_venta['d_venta']=$this->Models_punto_venta->d_venta();
		//print_r($d_venta);
		foreach($d_venta['d_venta'] as $row)
		{
			$producto=$row['producto'];
			$precio=$row['valor'];
			$tipo_producto=$row['tipo_producto'];
			$fecha=$row['fecha'];
			$eliminar='eliminar';
			echo '<tr>';
			echo '<td>'.$producto.'</td>';
			echo '<td>'.$precio.'</td>';
			echo '<td>'.$tipo_producto.'</td>';
			echo '<td>'.$fecha.'</td>';
			echo '<td><a href="#">eliminar</a></td>';
			echo '</tr>';

			//echo $producto;
		}
		//$this->load->view('venta',$d_venta);
		//echo "prueba";
	}
	public function total_Venta()
	{
		$precio=$this->input->post('precio');
		$tipo_producto=$this->input->post('tipo_producto');
		$nombre_producto=$this->input->post('nombre_producto');
		$this->Models_punto_venta->ingreso_venta($precio,$tipo_producto,$nombre_producto);
		
		//$d_venta['d_venta']=$this->Models_punto_venta->d_venta();
		//$this->load->view('venta',$d_venta);
		//echo '<p>'.$precio.'</p>';
		/*$det_venta=[
			'd_precio'=>$precio,
			'd_tipo_producto'=>$tipo_producto,
			'd_nombre_producto'=>$nombre_producto
		];*/
		
			/*foreach($det_venta as $row){
				
				//print_r($det_venta);
				$d_p=$row['d_precio'];
				echo $d_p;
				//echo "<input type='text' value=".$$p." class='form-control' />";
			}*/
	}
	public function finalizar_venta()
	{
		$tot_venta['tot_venta']=$this->Models_punto_venta->tot_venta();
		foreach($tot_venta['tot_venta'] as $row)
		{
			$total=$row['total'];
			echo '<label>total</label>';
			echo '<input id="total" type="text" value='.$total.' class="form-control" readonly="true" />';
		}

	}
	public function fin_venta()
	{
		$total_venta=$this->input->post('total_venta');
		$max_n_venta['max_n_venta']=$this->Models_punto_venta->f_venta();
		foreach($max_n_venta['max_n_venta'] as $row)
		{
			$n_venta=$row['n_venta'];
			//echo $n_venta;
			$this->Models_punto_venta->act_n_venta($n_venta,$total_venta);
		}
	}
	public function venta_pendiente()
	{
		$ve_pendiente['ve_pendiente']=$this->Models_punto_venta->ven_pendiente();
		foreach($ve_pendiente['ve_pendiente'] as $row)
		{
			$producto=$row['producto'];
			$valor=$row['valor'];
			$tipo_producto=$row['tipo_producto'];
			echo '<td>'.$producto.'</td>';
			echo '<td>'.$valor.'</td>';
			echo '<td>'.$tipo_producto.'</td>';			
		}
		//print_r($ve_pendiente);
	}
	
}
