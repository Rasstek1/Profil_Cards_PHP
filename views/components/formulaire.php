<?php

session_start();

?>


<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-bottom: 100px; /* Ou toute autre valeur qui correspond à la hauteur de votre footer */
        }

    </style>
</head>
<body>

<?php
include __DIR__ . '/header.php';
?>

<div class="container">
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
</div>
<div class="container mt-5">
    <div class="card p-4 shadow">
        <div class="card-body">

            <h1 class="text-center mb-4">Création de Profil de Personne</h1>
            <form action="../../actions/profile_action.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom"><!--name= la propriété de l'objet Personn dans ce cas prenom-->

                </div>
                <div class="mb-3">
                    <label for="compteEnBanque" class="form-label">Compte en Banque</label>
                    <input type="number" class="form-control" id="compteEnBanque" name="compteEnBanque" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="salaire" class="form-label">Salaire/Horaire</label>
                    <input type="number" class="form-control" id="salaire" name="salaire" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="animaux" class="form-label">Nombre d'Animaux</label>
                    <input type="number" class="form-control" id="animaux" name="animaux">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo de profil</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Créer Personne</button>

            </form>

            <div class="mt-3 text-center">
                <a href="profile_view.php" class="btn btn-outline-secondary">Afficher les profils</a>
            </div>

        </div>
    </div>
</div>


<?php include __DIR__ . '/footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
