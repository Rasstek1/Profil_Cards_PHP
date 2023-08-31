<?php

namespace helpers;

class Validation
{
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function isValid() {
        // Ici, vous pouvez ajouter des vérifications en fonction des besoins de votre application.
        if (empty($this->data['nom'])) {
            $this->errors[] = 'Le nom est requis.';
        }

        if (empty($this->data['compteEnBanque'])) {
            $this->errors[] = 'Le compte en banque est requis.';
        }

        if (empty($this->data['salaire'])) {
            $this->errors[] = 'Le salaire est requis.';
        }

        if (empty($this->data['animaux'])) {
            $this->errors[] = 'Le nombre d\'animaux est requis.';
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}