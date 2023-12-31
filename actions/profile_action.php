<?php
ob_start(); // Permet de stocker les données dans le tampon de sortie
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use helpers\Validation;

require_once __DIR__ . '/../models/utilisateur.php';
require_once __DIR__ . '/../helpers/Validation.php';




session_start();

function CreateProfile()
{
    // Validation du formulaire
    $validation = new Validation($_POST);  // Assurez-vous que la classe Validation est bien définie
    if (!$validation->isValid()) {
        error_log("Invalid form");  // Pour le log serveur
        var_dump($validation->getErrors());  // Pour le log dans la sortie (à enlever une fois le debug terminé)
        $_SESSION["errors"] = $validation->getErrors();
        header('Location: /Profil_Cards_PHP/views/components/formulaire.php');
        ob_end_flush();// Permet de vider le tampon de sortie et d'envoyer les données au navigateur
        exit;
    }



// Téléchargement de la photo
    $targetDir = __DIR__ . "/../fichiers/photos/";  // Notez l'ajout du slash

// Assurez-vous que le répertoire existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $photo = $_FILES["photo"];
    $photoName = time() . '.' . pathinfo($photo["name"], PATHINFO_EXTENSION);
    $targetPath = $targetDir . $photoName;

    if (!move_uploaded_file($photo["tmp_name"], $targetPath)) {
        $_SESSION["error"] = "Erreur lors du téléchargement du fichier.";
        header('Location: /Profil_Cards_PHP/views/components/profile_view.php');

        exit;
    }

    // Création de l'objet Personne
    var_dump($_POST);
    $Personne = new utilisateur(
        $_POST['prenom'],
        $_POST['compteEnBanque'],
        $_POST['salaire'],
        $_POST['animaux'],
        $photoName
    );

    // Stockez ici l'objet Personne dans la session
    $_SESSION['profiles'][] = serialize($Personne);

    $_SESSION['targetPath'] = $targetPath;





    // Redirection
    header('Location: /Profil_Cards_PHP/views/components/profile_view.php');

    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    CreateProfile();
}










