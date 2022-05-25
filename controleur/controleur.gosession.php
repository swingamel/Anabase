<?php
include("./modele/modele.session.php");
class Controleur_gosession
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
		$this->vue = "session";
		$this->modele = new Modele_session();
		$this->data['display'] = "";
		$this->data['filter'] = "";
		$this->data['pointer-events'] = "";
	}
	public function todo_initialiser()
	{
		$this->post["dateSession"] = "";
		$this->post["heureSession"] = "";
		$this->post["prixSession"] = "";
		$this->post["nomSession"] = "";
		$this->data["liste"] = $this->modele->getSession();
	}

	public function todo_enregistrer()
	{
		//Enregistrer le nom dans la base de données ....
		$this->modele->insertSession($this->post["datesession"], $this->post["heuresession"], $this->post["prixsession"], $this->post["nomsession"]);
	}

	public function todo_Modifier()
	{
		$numSession = $this->post['numsession'];
		$dateSession = $this->post['datesession'];
		$heureSession = $this->post['heuresession'];
		$prixSession = $this->post['prixsession'];
		$nomSession = $this->post['nomsession'];
		$this->modele->updateSession($numSession, $dateSession, $heureSession, $prixSession, $nomSession);
	}
	public function todo_Afficher()
	{
		//echo "afficher".$this->post['session'];
		$numsession = $this->post['session'];
		$this->data["afficher"] = $this->modele->getSessionByNum($numsession);
		$this->data['display'] = "display: block";
		$this->data['filter'] = "filter: blur(2px)";
		$this->data['pointer-events'] = "pointer-events: none";
		//print_r($this->data["afficher"]);
	}

	public function todo_Supprimer()
	{
		$numsession = $this->post['session'];
		$this->modele->deleteSession($numsession);
	}
}
