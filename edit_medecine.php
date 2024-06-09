<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification des données</title>
</head>
<body>
<?php
require('connexion.php');

// Initialisez la variable $row
$row = array();

// Récupération des informations du médicament à éditer si le formulaire est soumis
if(isset($_POST['edit_name'])) {
    $nom = $_POST['edit_name'];

    // Préparez la requête SQL pour récupérer les informations du médicament à éditer
    $sql = "SELECT * FROM medecine WHERE nom = :nom";

    // Préparez la déclaration
    $stmt = $con->prepare($sql);

    // Liez les paramètres
    $stmt->bindParam(':nom', $nom);

    // Exécutez la déclaration
    if($stmt->execute()) {
        // Récupérez les données du médicament
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    } else {
        echo "Erreur lors de la récupération des informations du médicament.";
    }
}
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <h2 style="text-align: center;">Modifier les informations du médecines</h2>
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
            </div>

            <div class="col col-md-12">
                <form action="#" method="post">
                    <input type="hidden" name="edit_name" value="<?php echo isset($row['nom']) ? $row['nom'] : ''; ?>">
                    <input type="text" name="nouveau_nom" value="<?php echo isset($row['nom']) ? $row['nom'] : ''; ?>" placeholder="Nom du médicament" required>
                    <input type="text" name="nouveau_domaine" value="<?php echo isset($row['domaine']) ? $row['domaine'] : ''; ?>" placeholder="Type de médicament" required>
                    <input type="text" name="nouvelle_addresse" value="<?php echo isset($row['addresse']) ? $row['addresse'] : ''; ?>" placeholder="Quantité" required>
                    <input type="text" name="nouvelle_cabinet" value="<?php echo isset($row['cabinet']) ? $row['cabinet'] : ''; ?>" placeholder="Quantité" required>
                    <input type="text" name="nouveau_contact" value="<?php echo isset($row['contact']) ? $row['contact'] : ''; ?>" placeholder="Prix" required>
                    <button type="submit" class="btn btn-info btn-sm" name="update_btn">
                        <i class="bi bi-pencil"></i> Mettre à jour
                    </button>
                </form>
            </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['update_btn'])) {
    $nom = $_POST['edit_name'];
    $nouveau_nom = $_POST['nouveau_nom'];
    $nouveau_domaine = $_POST['nouveau_domaine'];
    $nouvelle_addresse = $_POST['nouvelle_addresse'];
    $nouvelle_cabinet = $_POST['nouvelle_cabinet'];
    $nouveau_contact = $_POST['nouveau_contact'];
    
    if(empty($nouveau_nom) || empty($nouveau_domaine) || empty($nouvelle_addresse) || empty($nouvelle_cabinet) || empty($nouveau_contact)) {
        echo "Veuillez remplir tous les champs.";
    } else {

        $query = $con->prepare('UPDATE medecine SET nom = :nouveau_nom, domaine = :nouveau_domaine, addresse = :nouvelle_addresse, cabinet = :nouvelle_cabinet, contact = :nouveau_contact WHERE nom = :nom');
        $query->execute(array('nouveau_nom' => $nouveau_nom, 'nouveau_domaine' => $nouveau_domaine, 'nouvelle_addresse' => $nouvelle_addresse, 'nouvelle_cabinet' => $nouvelle_cabinet,'nouveau_contact' => $nouveau_contact,'nom'=>$nom));
        echo'<script>alert("les éléments à été modifiés avec succès")</script>';
        header('location: medecine.php');
        
    }
}