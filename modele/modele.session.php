<?php
class Modele_session
{
	private $conn;

	public function __construct()
	{
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO(
				"mysql:host=$serveur;dbname=$bd",
				$login,
				$mdp,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}
	public function insertSession($dateSession,  $heureSession, $prixSession, $nomSession)
	{
		try {

			$req = $this->conn->prepare("INSERT INTO session VALUES (NULL, :dateSession, :heureSession, :prixSession, :nomSession)");
			$req->execute(array(
				'dateSession' => $dateSession,
				'heureSession' => $heureSession,
				'prixSession' => $prixSession,
				'nomSession' => $nomSession,
			));
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}
	function getSession()
	{
		try {
			$req = $this->conn->prepare("SELECT * FROM session");
			$req->execute();

			$resultat = $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		return $resultat;
	}
	function updateSession($numSession, $dateSession, $heureSession, $prixSession, $nomSession)
	{
		try {
			$req = $this->conn->prepare("UPDATE session SET DATE_SESSION = ?,HEURE_SESSION = ?, PRIX_SESSION = ?, NOM_SESSION = ? 
                                         WHERE NUM_SESSION = ?");
			$req->bindValue(1, $dateSession);
			$req->bindValue(2, $heureSession);
			$req->bindValue(3, $prixSession);
			$req->bindValue(4, $nomSession);
			$req->bindValue(5, $numSession);
			$req->execute();
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}
	function deleteSession($numsession)
	{
		try {
			$req = $this->conn->prepare("DELETE FROM session
                                    WHERE NUM_SESSION = ?");
			$req->bindValue(1, $numsession);
			$req->execute();
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
	}
	function getSessionByNum($numsession)
	{
		try {
			$req = $this->conn->prepare("SELECT * FROM session WHERE NUM_SESSION = :NUM_SESSION");
			$req->bindValue(':NUM_SESSION', $numsession, PDO::PARAM_INT);
			$req->execute();

			$resultat = $req->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		return $resultat;
	}
	function getSessionListeCongressiste($NUM_SESSION)
	{
		try {
			$req = $this->conn->prepare("SELECT * FROM congressiste WHERE NUM_CONGRESSISTE 
					NOT IN (SELECT NUM_CONGRESSISTE FROM participation_session WHERE NUM_SESSION = ?)");
			$req->bindValue(1, $NUM_SESSION);
			$req->execute();

			$resultat = $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		return $resultat;
	}
	function getSessionListeCongressiste2($NUM_SESSION)
	{
		try {
			$req = $this->conn->prepare("SELECT * FROM congressiste WHERE NUM_CONGRESSISTE 
					IN (SELECT NUM_CONGRESSISTE FROM participation_session WHERE NUM_SESSION = ?)");
			$req->bindValue(1, $NUM_SESSION);
			$req->execute();

			$resultat = $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		return $resultat;
	}
	function insertCongressiste($NUM_CONGRESSISTE, $NUM_SESSION)
	{
		foreach ($NUM_CONGRESSISTE as $UnCongressiste) {
			try {

				$req = $this->conn->prepare("INSERT INTO participation_session VALUES (:NUM_CONGRESSISTE, :NUM_SESSION)");
				$req->execute(array(
					'NUM_CONGRESSISTE' => $UnCongressiste,
					'NUM_SESSION' => $NUM_SESSION
				));
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage();
				die();
			}
		}
	}
	function deleteCongressiste($NUM_CONGRESSISTE, $NUM_SESSION)
	{
		foreach ($NUM_CONGRESSISTE as $UnCongressiste) {
			try {
				$req = $this->conn->prepare("DELETE FROM participation_session
                                    WHERE NUM_CONGRESSISTE = ? AND NUM_SESSION = ?");
				$req->bindValue(1, $UnCongressiste);
				$req->bindValue(2, $NUM_SESSION);
				$req->execute();
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage();
				die();
			}
		}
	}
	function getCongressiste()
	{
		try {
			$req = $this->conn->prepare("SELECT * FROM congressiste");
			$req->execute();

			$resultat = $req->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}
		return $resultat;
	}
}
