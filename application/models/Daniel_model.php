<?php
class Daniel_model extends CI_Model {

        public function __construct()	{
          $this->load->database();
        }

	public function contadorUbicacion(){
		
		$query = $this->db->get('UBICACION','*');
		//$this->db->query('SELECT * FROM UBICACION');
		return $query;
	}
	// CONSULTAS DE EVENTO
	public function getEvento($id){
		$query = $this->db->query("SELECT NOMBRE, DESCRIPCION, FECHA, HORA, DATE_FORMAT(FECHACIERRE, '%d-%m-%Y') AS FECHACIERRE, PUNTO
									FROM EVENTO
									WHERE IDEVENTO=".$id);
		
		//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
        return $query->row();
	}
	public function getValorComprobanteEvento($id){
		$query = $this->db->query('SELECT SUM(E.VALOR) AS TOTAL, 
									(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id.'
									AND I.COMPROBANTE = 1
									) AS PAGO
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id);
		return $query->row();
	}
	public function getValorPagadoEvento($id){
		$query = $this->db->query('SELECT SUM(E.VALOR) AS TOTAL, 
									(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id.'
									AND I.COMPROBANTE = 2
									) AS PAGO
									FROM INSCRIPCIONEVENTO I, EVENTO E 
									WHERE I.IDEVENTO = E.IDEVENTO 
									AND I.IDEVENTO = '.$id);
		return $query->row();
	}
	public function getUsuariosInscritos($id){
		$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE, I.COMPROBANTE, U.IDNIVEL 
									FROM EVENTO E
									JOIN INSCRIPCIONEVENTO I ON
									E.IDEVENTO = I.IDEVENTO
									JOIN USUARIO U ON
									U.IDUSUARIO = I.IDUSUARIO
									WHERE E.IDEVENTO = ".$id);
		return $query->result();
	}
	public function getSenderoUbicacion($id){
		$query = $this->db->query('SELECT U.NOMBRE AS NOMBREUBICACION, U.INFORMACION, S.NOMBRE AS NOMBRESENDERO, U.CARACTERISTICA, U.RIESGOS
								FROM EVENTO E
								JOIN SENDERO S ON
								E.IDSENDERO = S.IDSENDERO
								JOIN UBICACION U ON
								S.IDUBICACION = U.IDUBICACION
								WHERE E.IDEVENTO = '.$id);
		return $query->row();
	}
	public function getEquipoEvento($id){
		$query = $this->db->query('SELECT M.IDEQUIPOTRECK AS ID ,M.DESCRIPCION 
								FROM EQUIPOEVENTO E
								JOIN MAESTROEQUIPO M ON
								E.IDEQUIPOTRECK = M.IDEQUIPOTRECK
								WHERE E.IDEVENTO ='.$id);
		return $query->result();
	}
	public function getAuto($id){
		$query = $this->db->query('SELECT COUNT(U.IDUSUARIO) AS AUTO
								FROM EVENTO E
								JOIN INSCRIPCIONEVENTO I ON
								E.IDEVENTO = I.IDEVENTO
								JOIN USUARIO U ON
								U.IDUSUARIO = I.IDUSUARIO
								WHERE E.IDEVENTO ='.$id.' AND U.AUTOCOMPAR = 1');
		return $query->row();
	}
	
	public function getGrafico($id){
		$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE 
									FROM EVENTO E
									JOIN INSCRIPCIONEVENTO I ON
									E.IDEVENTO = I.IDEVENTO
									JOIN USUARIO U ON
									U.IDUSUARIO = I.IDUSUARIO
									WHERE E.IDEVENTO = ".$id);
	
		$data = array();

		foreach ($query->result_array() as $key => $value) {
			$data[$key]['label'] = $value['IDUSUARIO'];
			$data[$key]['value'] = $value['NOMBRE'];
		}
		
		return $data;
	}
	//FIN CONSULTAS DE EVENTO
}