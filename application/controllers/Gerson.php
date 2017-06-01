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
	public function pack(){
		
		$this->load->model('Gerson_model');/* cargamos modelo con query*/
		$evento = $this->Gerson_model->getPack(1);
		$valor = $this->Gerson_model->getValorPagadoPack(1);
		$comprobante = $this->Gerson_model->getValorComprobantepack(1);
		$usuarios = $this->Gerson_model->getUsuariosInscritosPack(1);
		$senderos = $this->Gerson_model->getSenderosPack(1);
		
		$consulta['evento'] = $evento;
		$consulta['valor'] = $valor;
		$consulta['usuarios'] = $usuarios;
		$consulta['comprobante'] = $comprobante;
		$consulta['senderos'] = $senderos;
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/gerson_pack';
		$data['datos'] = $consulta;
		
		$this->load->view('base_administracion', $data);
		
		
	}
	public function Informeusuarios(){
		$this->load->model('Gerson_model');/* cargamos modelo con query*/
		$cantidadusuarios=$this->Gerson_model->contadorusuarios();/*Ejecujatamos la query*/
		$cantidadnuevostrekk=$this->Gerson_model->contadornuevostrekking();/*Ejecujatamos la query*/
		$cantidadnuevosregistrados=$this->Gerson_model->contadornuevosusuarios();
		$listausuarios=$this->Gerson_model->listausuarios();/*Ejecujatamos la query*/
		
		$hola["cantidadusuarios"]=$cantidadusuarios["contadorusuario"];
		$hola["cantidadnuevostrekk"]=$cantidadnuevostrekk["contadorusuario"];
		$hola["cantidadnuevosregis"]=$cantidadnuevosregistrados["contadorusuario"];
		$hola["listausuarios"]=$listausuarios;
		
		$data['encabezado'] = 'seccion/encabezado';
		$data['menu'] = 'seccion/menu';
		$data['contenido'] = 'seccion/contenido/gerson_usuarios';
		$data['datos'] =$hola;
		
		$this->load->view('base_administracion', $data);
		
		
	}
}