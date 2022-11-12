<?php
    //header("Content-Type: text/html;charset=utf-8");
    header('Content-Type: text/html; charset=iso-8859-1'); 
   
class Models_punto_venta extends CI_Model{

    public function __construct(){
        parent::__construct();
		//$this->db->query('SET ANSI_NULLS ON;');
        //$this->db->query('SET QUOTED_IDENTIFIER ON;');
        //$this->db->query('SET CONCAT_NULL_YIELDS_NULL ON;'); 
        //$this->db->query('SET ANSI_WARNINGS ON;');
        //$this->db->query('SET ANSI_PADDING ON;');		
		//sqlsrv_configure("WarningsReturnAsErrors", 0);
    }
    public function inserta_datos_punto_venta($nombre,$ap_p,$ap_m,$usuario,$clave)
    { 
        $data_pb=[
			'nombre'=>$nombre,
			'apellido_p'=>$ap_p,
			'apellido_m'=>$ap_m,
			'usuario'=>$usuario,
			'pass'=>$clave			
		];
        $this->db->insert('usuarios',$data_pb);
    }
    public function verifica_dat_user($us,$clave)
    {
        $query=$this->db->query("Select * from usuarios where usuario='".$us."' and pass='".$clave."' " );
        if($query!=false)
        {
			return $query->result_array();
        }
    }
    public function inserta_productos($nom,$tipo_prod,$precio,$cod_prod)
    {
        $producto=[
            'nombre'=>$nom,
            'tipo_producto'=>$tipo_prod,
            'precio'=>$precio,
            'cod_producto'=>$cod_prod
        ];
        $this->db->insert('productos',$producto);
    }
    public function tipo_producto($tipo_p)
    {
        $query=$this->db->query("select * from productos where tipo_producto='".$tipo_p."' ");
        if($query!=false)
        {
			return $query->result_array();
        }
    }
    public function ingreso_datos_cuenta($nomb,$nom_prod,$tipo_prod,$val_prod,$fecha,$cantidad,$total_operacion)
    {
        $datos_cuenta=[
            'nombre'=>$nomb,
            'tipo_producto'=>$tipo_prod,
            'nombre_producto'=>$nom_prod,
            'valor_producto'=>$val_prod,
            'fecha'=>$fecha,
            'cantidad'=>$cantidad,
            'total_operacion'=>$total_operacion,
            'pagado'=>'no'
        ];
        $this->db->insert('cuentas',$datos_cuenta);

    }
    public function detalle_cuentas()
    {
              $query_detalles_c=$this->db->query("select * from cuentas");
                if($query_detalles_c!=false)
                {
                    return $query_detalles_c->result_array();
                }
    }
    public function busqueda_cuenta($nombre_busqueda)
    {
        $nombre_busqueda_cuenta=$this->db->query("select * from cuentas where nombre='".$nombre_busqueda."' and pagado='no' ");
        if($nombre_busqueda_cuenta!=false)
        {
            return $nombre_busqueda_cuenta->result_array();
        }
    }
    public function total_deuda($nombre)
    {
        /*$this->db->select_sum('total_operacion', 'total');
        $this->db->where('pagado=','no');
        $this->db->where('nombre=',$nombre);
        $query = $this->db->get('cuentas');
        $resultado = $query->result();
        $total = $resultado[0]->total;
        //echo $total;*/
        
        $total_deuda=$this->db->query("select sum(total_operacion) as total from cuentas where pagado='no' and nombre='".$nombre."' ");
        $resultado_total_deuda=$total_deuda->result_array();
        foreach($resultado_total_deuda as $row)
        {
            $res_total_deuda=$row['total'];
            echo $res_total_deuda;
        } 
    }
    public function actualiza_pago_deuda($total_deuda,$nombre)
    {
        $actualiza_pago=$this->db->query("update cuentas set pagado='si' where nombre='".$nombre."' and pagado='no' ");
    }
    public function ing_data_insumo($tipo_insumo,$nombre_insumo,$precio_insumo,$cantidad,$precio_venta)
    {
        $datos_insumo=[
            'tipo_insumo'=>$tipo_insumo,
            'nombre_insumo'=>$nombre_insumo,
            'precio_insumo'=>$precio_insumo,
            'cantidad'=>$cantidad,
            'precio_venta'=>$precio_venta
            
        ];
        //print_r($datos_insumo);
        $this->db->insert('insumos',$datos_insumo);
    }
    public function busca_tipo_insumo($tipo_insumo)
    {
        $detalle_tipo_insumo=$this->db->query('select * from insumos where tipo_insumo="'.$tipo_insumo.'" ' );
        if($detalle_tipo_insumo!=false)
        {
            return $detalle_tipo_insumo->result_array();
        }       
        
    }
    public function b_precio_por_ingreso_costo($precio_por)
    {
        $d_precio_por=$this->db->query('select precio_insumo from insumos where nombre_insumo="'.$precio_por.'" ');
        if($d_precio_por!=false)
        {
            return $d_precio_por->result_array();
        }
    }
    public function busca_insumos()
    {
        $trae_insumos=$this->db->query('select * from insumos');
        if($trae_insumos!=false)
        {
            return $trae_insumos->result_array();
        }
    }
    public function busca_productos()
    {
        $busca_precios=$this->db->query('select * from productos');
        if($busca_precios!=false)
        {
            return $busca_precios->result_array();
        }
    }
    public function editar_inventario($id)
    {
        $mostrar_datos=$this->db->query("select * from insumos where id='".$id."' ");
        if($mostrar_datos!=false)
        {
            return $mostrar_datos->result_array();
        }
    }
    public function detalle_precio_venta($p_tipo_prod,$p_nom_producto)
    {
        $detalle_p_v=$this->db->query('select * from productos where nombre="'.$p_nom_producto.'" and tipo_producto="'.$p_tipo_prod.'" ');
        $d_detalle_p_v=$detalle_p_v->result_array();
        foreach($d_detalle_p_v as $row)
        {
            $d_d_detalle_p_v=$row['precio'];
            echo $d_d_detalle_p_v;
        }

        /*if($detalle_p_v!=false)
        {
            return $detalle_p_v->result_array();
        }*/
    }
    public function ingreso_venta($precio,$tipo_producto,$nombre_producto)
    {
        if($precio=="" && $tipo_producto=="" && $nombre_producto="")
        {
            echo "vacio";
        }
        else
        {
            $fecha = new DateTime();
            $fecha_d_m_y = $fecha->format('Y-m-d h:s');
            $fecha_d_m_y;
            $detalle_venta=[
                'n_venta'=>'0',
                'producto'=>$nombre_producto,
                'valor'=>$precio,
                'estado'=>'0',
                'fecha'=>$fecha_d_m_y,
                'tipo_producto'=>$tipo_producto,            
            ];
            //print_r($detalle_venta);
           
            $this->db->insert('ventas',$detalle_venta);
            //det_venta();  
        }       
    }
    public function d_venta()
    {
        $d_venta=$this->db->query("select * from ventas where estado='0' ");
        if($d_venta!=false)
        {
            return $d_venta->result_array();
        }
        

    }
    public function tot_venta()
    {
        $total_venta=$this->db->query("select sum(valor) as total from ventas where estado='0' ");
        if($total_venta!=false)
        {
            return $total_venta->result_array();
        }
    }
    

}