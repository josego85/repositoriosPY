<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas extends CI_Model {
    /**
     * Modelo para manejo de los eventos.
     * @author josego
     */
    public function __construct(){
        parent::__construct();
        //$this->load->database();
    }

    /**
     * M\u00E9todo p\u00FAblico para listar todas las personas.
     * @return unknown
     */
    public function listarPersonas(){
        $this->db->select("sql_calc_found_rows persona_id, concat_ws(' ', p.persona_nombres, p.persona_apellidos) as nombre_completo", false);
        $v_consulta = $this->db->get('personas p');
        return $v_consulta;
    }

    /**
     * M\u00E9todo p\u00FAblico que lista todos los repositorios de una persona
     * espec\u00EDfica.
     * @return unknown
     */
    public function listarRepositoriosPorPersona($p_persona_id){
        $this->db->select("r.repositorio_link as link", false);
         $this->db->where('r.persona_id', $p_persona_id, FALSE);
        $v_consulta = $this->db->get('repositorios r');
        return $v_consulta;
    }
//    /**
//     * Metodo para traer todos los eventos.
//     * @return unknown
//     */
//    public function listarEventosApartirFecha($p_fecha_actual){
//    	// SELECT *
//    	//     FROM  `eventos`
//    	//     WHERE (evento_fecha_inicio >=  '2014-04-07'  OR evento_fecha_fin >=  '2014-04-07')
//    	$v_where = "(evento_fecha_inicio >='" . $p_fecha_actual . "' OR evento_fecha_fin >='" . $p_fecha_actual . "')";
//    	$this->db->where($v_where);
//    	$this->db->where("evento_estado", "publicado");
//    	$v_consulta = $this->db->get('eventos');
//    	return $v_consulta;
//    }
//
//    /**
//     * Metodo para filtrar todos los eventos por fecha.
//     * @return unknown
//     */
//    public function filtrarEventos($p_fecha_desde, $p_fecha_hasta){
//    	$p_fecha_desde = $p_fecha_desde ." 00:00:00";
//    	$p_fecha_hasta = $p_fecha_hasta ." 23:59:59";
//    	$v_where = "((evento_fecha_inicio >='" . $p_fecha_desde . "' OR
//    			evento_fecha_fin >='" . $p_fecha_desde . "') AND
//    			  (evento_fecha_inicio <='" . $p_fecha_hasta . "' OR
//    			evento_fecha_fin <='" . $p_fecha_hasta . "'))";
//    	$this->db->where($v_where);
//    	$this->db->where("evento_estado", "publicado");
//    	$v_consulta = $this->db->get('eventos');
//    	return $v_consulta;
//    }
//
//
//    /**
//     * Recupera la cantidad de filas (reales si se uso sql_calc_found_rows) de la ultima consulta que se haya ejecutado
//     * @return integer
//     */
//    public function get_cantidad_resultados(){
//    	return $this->db->query('select FOUND_ROWS() as found_rows')->row()->found_rows;
//    }
//
//    /**
//     *
//     * @param Array $p_datos
//     * @return boolean
//     */
//    public function insertarEvento($p_datos){
//    	if($this->db->insert('eventos', $p_datos)){
//    		return $this->db->insert_id();
//    	}
//    	return false;
//
//    }
}
/* End of personas.php */