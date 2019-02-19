<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function create() {
        $data = array (
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'existencias' => $this->input->post('existencias')
        );
        $this->db->insert('articulos', $data);
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM articulos');
        return $query->result();
    }

    function getById($id) {
        $query = $this->db->query('SELECT * FROM articulos WHERE `id` =' .$id);
        return $query->row();
    }

    function update($id) {
        $data = array (
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'existencias' => $this->input->post('existencias')
        );
        $this->db->where('id', $id);
        $this->db->update('articulos', $data);
    }
    
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('articulos');
    }

    function is_uniqued(){
        $clave = $this->input->post('clave');
        $id = $this->input->post('id');

        $this->db->select('clave');
		$this->db->from('articulos');
        $this->db->where('clave', $clave);

        if($id){
            $this->db->where_not_in('id', $id);
        }
        
        $query = $this->db->get();
		$num = $query->num_rows();
		if ($num > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
        
    }
}