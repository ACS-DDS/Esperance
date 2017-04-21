<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('Model_esp');
		$this->load->helper('url');
	}

	public function getDep(){

		$dep['numCode'] = $this->Model_esp->numeroNomDepartement();
		echo json_encode($dep); 
	}

	public function esperance() {

		$departement = $this->input->post('departement');
		$genre = $this->input->post('gender');
		$age = $this->input->post('age');

		if (isset($departement) && isset($genre) && isset($age)) {

			$data['esperance'] = $this->Model_esp->calculeEsperance($age, $genre, $departement);
		} else {
			$data['erreur'] = "Veuillez remplir tous les champs.";
		}

		echo json_encode($data);		
	}	
}