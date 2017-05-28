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
}