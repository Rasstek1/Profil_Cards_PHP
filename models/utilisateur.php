<?php


class utilisateur
{

    const NB_HEURES_TRAVAIL = 8.0;

    protected string $nom;
    protected float $compteEnBanque;

    private float $salaire;

    private $photo; // Type non spécifié pour la photo

    private int $nbAnimaux;

    public function __construct(string $nom, float $compteEnBanque, float $salaire, int $animaux, $photo)
    {

        $this->nom = $nom;
        $this->compteEnBanque = $compteEnBanque;
        $this->salaire = $salaire;
        $this->nbAnimaux = $animaux;
        $this->photo = $photo;

    }

    public function getNom(): string
    {
        if ($this->nom == "") {
            return "nom non defini";
        } else {
            return $this->nom;
        }
    }

    public function getCompteEnBanque(): string
    {
        if ($this->compteEnBanque == "") {
            return "Compte en banque non defini";
        } else {
            return number_format($this->compteEnBanque, 2);
        }
    }



    public function travailler8h() {
        $this->compteEnBanque += $this->salaire * self::NB_HEURES_TRAVAIL;
        // Si vous avez besoin d'ajouter 8 heures au travail, assurez-vous d'avoir un attribut correspondant
        // $this->nb_heures_travail += 8; // Ceci nécessite une propriété $nb_heures_travail dans la classe
    }

    public function getNbHeuresTravail(): float
    {
        return self::NB_HEURES_TRAVAIL; // Pas besoin de $this ici car c'est une constante de classe
    }

    public function getSalaire(): string
    {
        if ($this->salaire == "") {
            return "Salaire non defini";
        } else {
            return number_format($this->salaire, 2);
        }
    }



    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPhoto() {
        return $this->photo;
    }
    public function addAnimal(Animal $animal) {
        $this->animaux[] = $animal;
    }
    public function getNombreAnimaux() {
        return $this->nbAnimaux;
    }


}
