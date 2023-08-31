<?php


/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
require __DIR__ . '/../../actions/profile_action.php';


include __DIR__ . '/header.php';


// Vérification de la présence des données de session
if (!isset($_SESSION["targetPath"])) {
    die("Erreur: La variable targetPath de la session est manquante.");
}

if (!isset($_SESSION["profiles"])) {
    die("Erreur: La variable profiles de la session est manquante.");
}

?>


<?php
?>


<?php
$serializedPersonne = $_SESSION["profiles"][0];
if (is_string($serializedPersonne)) {
    $Personne = unserialize($serializedPersonne);
} elseif (is_object($serializedPersonne)) {
    $Personne = $serializedPersonne;
} else {
    var_dump($serializedPersonne);  // Pour le debug
    die("La valeur à désérialiser n'est ni une chaîne ni un objet.");
}
?>

<body>
<div class="container mt-5">
    <h1>Profiles</h1>
    <div class="profile-section">
        <?php if (isset($_SESSION["profiles"])): ?>
            <?php foreach ($_SESSION["profiles"] as $profileKey => $serializedPersonne):
                $Personne = unserialize($serializedPersonne); // Désérialisez l'objet ici
                ?>
                <div class="card p-3 shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/../fichiers/photos/<?php echo $Personne->getPhoto(); ?>" class="card-img" alt="Photo de profil">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $Personne->getNom(); ?></h4>
                                <!-- J'ai enlevé la div card-body imbriquée ici -->
                                <p><strong>Compte en Banque :</strong> <?php echo $Personne->getCompteEnBanque(); ?>$Can</p>
                                <p><strong>Salaire :</strong> <?php echo $Personne->getSalaire(); ?>$Can</p>
                                <p><strong>Nombre d'Animaux :</strong> <?php echo $Personne->getNombreAnimaux(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun profil n'a été créé pour le moment.</p>
        <?php endif; ?>
    </div> <!-- Fin de la div profile-section -->
</div> <!-- Fin de la div container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include __DIR__ . '/footer.php' ?>

