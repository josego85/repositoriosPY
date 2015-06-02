<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    /**
     *
     * @author josego
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('Personas', 'personas');
    }

    /**
     *
     */
    public function index(){
        $this->load->view('inicio');
    }
    
    /**
     * M\u00E9todo p\u00FAblico para listar todas las personas.
     * @return Array
     */
    public function listarPersonas(){
        // Se obtiene la lista de todas las personas.
        $v_array_personas = $this->personas->listarPersonas()->result();
        
        foreach($v_array_personas as $v_indice => $v_persona){   
            // Se obtiene el o los repositorios por persona.
            $v_repositorios = $this->personas->listarRepositoriosPorPersona($v_persona->persona_id);
            
            // Se guarda en un array los repositorios dentro del objeto persona.
            $v_persona->repositorios = $v_repositorios->result();
        }
        echo json_encode($v_array_personas);
    }
}
