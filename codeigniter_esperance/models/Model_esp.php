<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_esp extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
     
    public function numeroNomDepartement() {
        $numero = $this->db->query("SELECT code_departement, noms_departement FROM departements");

        return $numero->result_array();
    }    

	public function calculeEsperance($age, $genre, $departement) {
		// Je recupere l'id du departement
		$dep = $this->db->query("SELECT id FROM departements WHERE noms_departement = ?", [$departement]);
		$id_dep = $dep->row('id');
		// return $db->row('id');

		// Je recupere l'age.floor et l'age.ceil
		$ageBase = floor($age / 20) * 20;
		$ageBase2 = $ageBase + 20;

		// Je définie la colonne selectionné en fonction du genre
		if ($genre == "homme") {
			$esp_vie = "homme_esp_vie";
		} else {
			$esp_vie = "femme_esp_vie";
		}

		$espBase = $this->db->query("SELECT $esp_vie FROM personnes WHERE age = ? AND id_departement = ?", [$ageBase, $id_dep]);
		// return $espBase->result_array();
		$esp = $espBase->row($esp_vie);

		$espBase2 = $this->db->query("SELECT $esp_vie FROM personnes WHERE age = ? AND id_departement = ?", [$ageBase2, $id_dep]);
		$esp2 = $espBase2->row($esp_vie);		

		$difference = $esp - $esp2;
		$ageBase = floor($age / 20) * 20;
        $esperance = ($difference) / 20 * ($ageBase2 - $age) + $esp2;

        $float = $esperance - floor($esperance);
        $jour = floor($float * 365);
        $mois = floor($jour / 30);         

        $esperance = floor($esperance);
        $esp_annee_jour = $esperance.' ans et '.$mois.' mois à vivre.';

        return  $esp_annee_jour;

	}
}