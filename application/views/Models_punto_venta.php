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
    public function ing_data_insumo($tipo_insumo,$nombre_insumo,$precio_insumo)
    {
        $datos_insumo=[
            'tipo_insumo'=>$tipo_insumo,
            'nombre_insumo'=>$nombre_insumo,
            'precio_insumo'=>$precio_insumo
            
        ];
        //print_r($datos_insumo);
        $this->db->insert('insumos',$datos_insumo);
    }
    public function busca_tipo_insumo($tipo_insumo)
    {
        $detalle_tipo_insumo=$this->db->query('select * from insumos where tipo_insumo="'.$tipo_insumo.'" ' );
        $det_t_in=$detalle_tipo_insumo->result_array();
        print_r($det_t_in);
    }

}