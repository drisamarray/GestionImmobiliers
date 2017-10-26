<?php

class Membre {

	private $identifiant;
  private $motdepasse;
	private $courriel="";
	private $nom="";
	private $prenom="";
  private $adresse="";
  private $ville="";
  private $pays="";
	private $telephone="";

	//getters
	public function getIdentifiant()
	{
			return $this->identifiant;
	}

	public function getCourriel()
  {
      return $this->courriel;
  }

	public function getMotDePasse()
	{
			return $this->motdepasse;
	}

	public function getNom()
	{
			return $this->nom;
	}

  public function getPrenom()
  {
      return $this->prenom;
  }

	public function getAdresse()
	{
			return $this->adresse;
	}

  public function getVille()
  {
      return $this->ville;
  }

  public function getPays()
  {
      return $this->pays;
  }

	public function getTelephone()
  {
      return $this->telephone;
  }

  //Les setters
	public function setIdentifiant($value)
	{
			return $this->identifiant = $value;;
	}

	public function setCourriel($value)
	{
			$this->courriel = $value;
	}

	public function setMotDePasse($value)
	{
			return $this->motdepasse = $value;
	}

	public function setNom($value)
	{
			return $this->nom = $value;
	}

  public function setPrenom($value)
  {
      return $this->prenom = $value;
  }

	public function setAdresse($value)
	{
			return $this->adresse = $value;
	}

  public function setVille($value)
  {
      return $this->ville = $value;
  }

  public function setPays($value)
  {
      return $this->pays = $value;
  }

	public function setTelephone($value)
  {
      return $this->telephone = $value;
  }

	public function loadFromArray($tab)
	{
		$this->identifiant = $tab["IDENTIFIANT"];
		$this->motdepasse = $tab["MOTDEPASSE"];
		$this->courriel = $tab["COURRIEL"];
		$this->nom = $tab["NOM"];
		$this->prenom = $tab["PRENOM"];
		$this->adresse = $tab["ADRESSE"];
		$this->ville = $tab["VILLE"];
		$this->pays = $tab["PAYS"];
		$this->telephone = $tab["TELEPHONE"];
	}

	public function loadFromObject($x)
	{
		$this->identifiant = $x->IDENTIFIANT;
		$this->motdepasse = $x->MOTDEPASSE;
		$this->courriel = $x->COURRIEL;
		$this->nom = $x->NOM;
		$this->prenom = $x->PRENOM;
		$this->adresse = $x->ADRESSE;
		$this->ville = $x->VILLE;
		$this->pays = $x->PAYS;
		$this->telephone = $x->TELEPHONE;
	}

}
