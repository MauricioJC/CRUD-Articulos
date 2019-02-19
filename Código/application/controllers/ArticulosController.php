<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticulosController extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('session','form_validation'));
		$this->load->model('Articulo');
	}
	
	public function index()
	{
		$data['articulos'] = $this->Articulo->getAll();
		$this->load->view('articulos/index', $data);
	}

	public function create(){
		$this->load->view('articulos/create');
	}


	private function getRules(){
		return array(
			array(
					'field' => 'clave',
					'label' => 'Clave',
					'rules' => 'required|max_length[20]|callback_clave_unica',
					'errors'=> array(
						'required' => 'El campo Clave es necesario.',
						'max_length' => 'El campo Clave debe contener menos de 20 caracteres.',
						'clave_unica' => 'La clave ingresada ya está siendo ocupado por otro artículo'
					)
			),
			array(
					'field' => 'nombre',
					'label' => 'Nombre',
					'rules' => 'required|max_length[40]',
					'errors' => array(
							'required' => 'El campo Nombre es necesario.',
							'max_length' => 'El campo Nombre debe contener menos de 40 caracteres.'
					)
			),
			array(
					'field' => 'existencias',
					'label' => 'Existencias',
					'rules' => 'required|integer',
					'errors' => array(
						'required' => 'El campo Existencias es necesario.',
						'integer' => 'El campo Existencias debe ser un número entero.'
					)
			)
		);
	}

	function clave_unica() {
		return $this->Articulo->is_uniqued();
	}

	public function store(){
		$this->form_validation->set_rules($this->getRules());
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('articulos/create');
		}
		else
		{
			$this->Articulo->create();
			$this->session->set_flashdata('message', '¡Se ha creado el Artículo exitosamente!');
        	redirect("ArticulosController");
		}
	}

	public function edit($id){
		$data['articulo'] = $this->Articulo->getById($id);
        $this->load->view('articulos/edit', $data);
	}

	public function update($id){
		$this->form_validation->set_rules($this->getRules());
		if ($this->form_validation->run() === FALSE)
		{
			$data['articulo'] = $this->Articulo->getById($id);
        	$this->load->view('articulos/edit', $data);
		}
		else
		{
			$this->Articulo->update($id);
			$this->session->set_flashdata('message', '¡Se ha editado la información del Artículo exitosamente!');
			redirect("ArticulosController");
		}
	}

	public function delete($id){
		$this->Articulo->delete($id);
		$this->session->set_flashdata('message', '¡Se ha eliminado el Artículo exitosamente!');
        redirect("ArticulosController");
	}
}
