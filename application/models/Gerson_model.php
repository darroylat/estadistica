<?php
class Gerson_model extends CI_Model {

        public function __construct()	{
          $this->load->database();
        }
        
        public function contadoreventos(){
        	
        	$query=$this->db->query('select count(*) as contadoreventos from EVENTO');
        	return $query->row_array();
        	
        }
        
        public function contadordepositos(){
        	
        	$query=$this->db->query('SELECT COUNT(IDINSCRIPCION) AS CONTADORDEPOSITOS FROM INSCRIPCIONEVENTO WHERE COMPROBANTE=1');
        	return $query->row_array();
        	
        }
        
        public function contadorusuarios(){
        	
        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO');
        	return $query->row_array();
        	
        }
        public function contadornuevostrekking(){
        	
        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO where PRIMERTREKKING=1');
        	return $query->row_array();
        	
        }
        public function contadornuevosusuarios(){
        	
        	$query=$this->db->query('select count(*) as contadorusuario from USUARIO
where  left(INGRESO,10)=left(now(),10)');
        	return $query->row_array();
        	
        }
        
        /*public function comprobantesnocomprantes(){
        	
        	$query=$this->db->query('select E.nombre,COUNT(I.COMPROBANTE) as COMPROBANTE,(select COUNT(I.COMPROBANTE)
			from EVENTO E
			LEFT JOIN INSCRIPCIONEVENTO I ON E.IDEVENTO=I.IDEVENTO
			WHERE COMPROBANTE=0
			GROUP BY E.IDSENDERO) AS NOACOMPRANTE
			from EVENTO E
			LEFT JOIN INSCRIPCIONEVENTO I ON E.IDEVENTO=I.IDEVENTO
			WHERE COMPROBANTE=1
			GROUP BY E.IDSENDERO');
        	return $query;
        }*/
		public function listausuarios(){
        	
        	$query=$this->db->query('select U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL,U.AUTOCOMPAR,U.EDAD,
        	U.INSTAGRAM,U.INGRESO
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.IDNIVEL');
        	return $query;
        	
        }
        
        public function listaservicios(){
        	
        	$query=$this->db->query(' select NOMBRE as eventos from EVENTO
			union
			select NOMBRE as pack from PACK');
        	return $query;
        	
        }
        
        public function getPack($id){
		$query = $this->db->query("SELECT *
									FROM PACK
									WHERE IDPACK=".$id);
		
		//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
        return $query->row();
		}
		public function getSenderosPack($id){
		$query = $this->db->query("SELECT O.NOMBRE FROM PACK P
									LEFT JOIN SENDEROPACK S
									ON P.IDPACK=S.IDPACK
									LEFT JOIN UBICACION O
									ON O.IDUBICACION=S.IDSENDERO
									WHERE P.IDPACK=".$id);
		
		//$query = $this->db->get_where('EVENTO',array('IDEVENTO' => $id));
        return $query->result();
		}
		
		public function getValorComprobantepack($id){
		$query = $this->db->query('SELECT SUM(E.VALOR) AS TOTAL,(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONPACK I, PACK E 
									WHERE I.IDPACK= E.IDPACK
									AND I.IDPACK= '.$id.'
									AND I.COMPROBANTE = 1 ) AS PAGO
									FROM INSCRIPCIONPACK I, PACK E 
									WHERE I.IDPACK= E.IDPACK
									AND I.IDPACK='.$id);
		return $query->row();
		}
		public function getValorPagadoPack($id){
		$query = $this->db->query('SELECT SUM(E.VALOR) AS TOTAL,(SELECT SUM(E.VALOR)
									FROM INSCRIPCIONPACK I, PACK E 
									WHERE I.IDPACK= E.IDPACK
									AND I.IDPACK= '.$id.'
									AND I.COMPROBANTE = 2 ) AS PAGO
									FROM INSCRIPCIONPACK I, PACK E 
									WHERE I.IDPACK= E.IDPACK
									AND I.IDPACK='.$id);
		return $query->row();
	}
		public function getUsuariosInscritosPack($id){
		$query = $this->db->query("SELECT U.IDUSUARIO,CONCAT(U.NOMBRE,' ',U.APELLIDO) AS NOMBRE, I.COMPROBANTE 
									FROM PACK E
									JOIN INSCRIPCIONPACK I ON
									E.IDPACK= I.IDPACK
									JOIN USUARIO U ON
									U.IDUSUARIO = I.IDUSUARIO
									WHERE E.IDPACK=".$id);
		return $query->result();
		}
}