<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerson extends CI_Controller {

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
		$this->load->model('Gerson_model');/* cargamos modelo con query*/
		$cantidadeventos=$this->Gerson_model->contadoreventos();/*Ejecujatamos la query*/
		$cantidadusuarios=$this->Gerson_model->contadorusuarios();/*Ejecujatamos la query*/
		$cantidaddeposito=$this->Gerson_model->contadordepositos();/*Ejecujatamos la query*/
	/*	$cantidadcnc=$this->Gerson_model->comprobantesnocomprantes();/*revisar como cargar en grafico*/
		$listausuarios=$this->Gerson_model->listausuarios();/*Ejecujatamos la query*/
		$listaservicios=$this->Gerson_model->listaservicios();/*Ejecujatamos la query*/
		
		$hola["holamundo"]="Ya podras administrar tus salidas de trekking de manera mas sencilla en un solo lugar ";
		$hola["cantidadaeventos"]=$cantidadeventos["contadoreventos"];
		$hola["cantidadusuarios"]=$cantidadusuarios["contadorusuario"];
		$hola["cantidaddepositos"]=$cantidaddeposito["CONTADORDEPOSITOS"];
	/*	$hola["cantidadcnc"]=$cantidadcnc;*/
		$hola["listausuarios"]=$listausuarios;
		$hola["listaservicios"]=$listaservicios;
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/gerson';
		$data['datos'] =$hola;
		
		$this->load->view('base_administracion', $data);
	}
}