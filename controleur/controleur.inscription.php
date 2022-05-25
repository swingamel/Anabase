<?php
include("./modele/modele.session.php");
class Controleur_inscription
{
	// --- champs de base du controleur
	public $vue = ""; //vue appelée par le controleur

	public $message = "";
	public $erreur = "";

	public $data; // le tableau des données de la vue

	public $modele; // nom du modele

	public $post; // renseigné par index

	// --- Constructeur
	public function __construct()
	{
		// déclarer la vue
		$this->vue = "inscription_session";
		$this->modele = new Modele_session();
		$this->data['displayinc'] = "";
		$this->data['displaysup'] = "";
		$this->data['filter'] = "";
		$this->data['pointer-events'] = "";
	}
	public function todo_initialiser($numsession = "")
	{
		$this->data['numsession'] = $numsession;
		$this->data["liste"] = $this->modele->getSession();
	}
	public function todo_Inscrire()
	{
		$this->data['displayinc'] = "display: block";
		$this->data['filter'] = "filter: blur(2px)";
		$this->data['pointer-events'] = "pointer-events: none";
	}
	public function todo_inscription()
	{
		if (isset($_POST['NUM_CONGRESSISTE'])) {
			//Enregistrer le nom dans la base de données ....
			$this->modele->insertCongressiste($this->post["NUM_CONGRESSISTE"], $this->post["NUM_SESSION"]);
		} else {
			echo '<p class="style_css">⚠️Vous devez sélectionner au moins un congressiste !⚠️</p>';
			$this->data['displayinc'] = "display: block";
			$this->data['filter'] = "filter: blur(2px)";
			$this->data['pointer-events'] = "pointer-events: none";
		}
	}
	public function todo_SupprimerCongressiste()
	{
		$this->data['displaysup'] = "display: block";
		$this->data['filter'] = "filter: blur(2px)";
		$this->data['pointer-events'] = "pointer-events: none";
	}
	public function todo_suppression()
	{
		if (isset($_POST['NUM_CONGRESSISTE'])) {
			$this->modele->deleteCongressiste($this->post["NUM_CONGRESSISTE"], $this->post["NUM_SESSION"]);
		} else {
			echo '<p class="style_css">⚠️Vous devez sélectionner au moins un congressiste !⚠️</p>';
			$this->data['displaysup'] = "display: block";
			$this->data['filter'] = "filter: blur(2px)";
			$this->data['pointer-events'] = "pointer-events: none";
		}
	}
	public function todo_Visualiser()
	{
		$this->data['displayinc'] = "display: block";
		$this->data['filter'] = "filter: blur(2px)";
		$this->data['pointer-events'] = "pointer-events: none";
	}
}
