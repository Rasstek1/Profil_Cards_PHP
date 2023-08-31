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
        $allFields = ['prenom', 'compteEnBanque', 'salaire', 'animaux'];
        $allFieldsFilled = true;

        foreach ($allFields as $field) {
            if (empty($this->data[$field])) {
                $allFieldsFilled = false;
                break;
            }
        }

        if (!$allFieldsFilled) {
            $this->errors[] = 'Tous les champs sont requis.';
        }

        return $allFieldsFilled;
    }


    public function getErrors() {
        return $this->errors;
    }
}