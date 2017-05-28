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
        	
        	$query=$this->db->query('select U.NOMBRE,U.APELLIDO,U.TELEFONO, M.NOMBRE AS NIVEL, U.EMAIL
			from USUARIO U
			LEFT JOIN MAESTRONIVELUSUARIO M ON M.IDNIVEL=U.NIVEL');
        	return $query;
        	
        }
        public function listaservicios(){
        	
        	$query=$this->db->query(' select NOMBRE as eventos from EVENTO
			union
			select NOMBRE as pack from PACK');
        	return $query;
        	
        }
}