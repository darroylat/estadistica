<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daniel extends CI_Controller {

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
		
		$this->load->model('Daniel_model');
		$ubicacion = $this->Daniel_model->contadorUbicacion();
		$cantidad = 0;
		foreach ($ubicacion as $row) {
			$cantidad++;
		}
		
		$hola['holamundo'] = 'Hola Mundo';
		$hola['ubicacion'] = $cantidad;
		
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/daniel';
		$data['datos'] = $hola;
		
		$this->load->view('base_administracion', $data);
	}
	
	public function evento(){
		$this->load->model('Daniel_model');
		
		$evento = $this->Daniel_model->getEvento(1);
		$valor = $this->Daniel_model->getValorPagadoEvento(1);
		$comprobante = $this->Daniel_model->getValorComprobanteEvento(1);
		$usuarios = $this->Daniel_model->getUsuariosInscritos(1);
		$ubicacion = $this->Daniel_model->getSenderoUbicacion(1);
		$equipo = $this->Daniel_model->getEquipoEvento(1);
		$cantidad = $this->Daniel_model->getAuto(1);
		
		$consulta['evento'] = $evento;
		$consulta['valor'] = $valor;
		$consulta['usuarios'] = $usuarios;
		$consulta['ubicacion'] = $ubicacion;
		$consulta['comprobante'] = $comprobante;
		$consulta['equipo'] = $equipo;
		$consulta['cantidad'] = $cantidad;
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/daniel_evento';
		$data['datos'] = $consulta;
		
		$this->load->view('base_administracion', $data);
		
		
	}
	
	public function grafico(){
		
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/daniel_grafico';
		//$data['datos'] = $consulta;
		
		$this->load->view('base_administracion', $data);
		
	}
	
	public function vergrafico(){
		$cantidad = $this->Daniel_model->getGrafico(1);
		
		echo json_encode($cantidad);
	}
}