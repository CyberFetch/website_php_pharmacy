<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require('connexion.php');

// Initialisez la variable $row
$row = array();

// Récupération des informations du médicament à éditer si le formulaire est soumis
if(isset($_POST['edit_nom'])) {
    $nom_medicament = $_POST['edit_nom'];

    // Préparez la requête SQL pour récupérer les informations du médicament à éditer
    $sql = "SELECT * FROM medicamment WHERE nom_medicament = :nom_medicament";

    // Préparez la déclaration
    $stmt = $con->prepare($sql);

    // Liez les paramètres
    $stmt->bindParam(':nom_medicament', $nom_medicament);

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
                <h2 style="text-align: center;">Modifier les informations du médicament</h2>
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
            </div>

            <div class="col col-md-12">
                <form action="#" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo isset($row['nom_medicament']) ? $row['nom_medicament'] : ''; ?>">
                    <input type="text" name="nouveau_nom_medicament" value="<?php echo isset($row['nom_medicament']) ? $row['nom_medicament'] : ''; ?>" placeholder="Nom du médicament" required>
                    <input type="text" name="nouveau_type_medicament" value="<?php echo isset($row['type_medicament']) ? $row['type_medicament'] : ''; ?>" placeholder="Type de médicament" required>
                    <input type="text" name="nouveau_Prix" value="<?php echo isset($row['Prix']) ? $row['Prix'] : ''; ?>" placeholder="Prix" required>
                    <input type="text" name="nouvelle_Quantite" value="<?php echo isset($row['Quantite']) ? $row['Quantite'] : ''; ?>" placeholder="Quantité" required>
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
    $nom_medicament = $_POST['edit_id'];
    $nouveau_nom_medicament = $_POST['nouveau_nom_medicament'];
    $nouveau_type_medicament = $_POST['nouveau_type_medicament'];
    $nouveau_Prix = $_POST['nouveau_Prix'];
    $nouvelle_Quantite = $_POST['nouvelle_Quantite'];

    if(empty($nouveau_nom_medicament) || empty($nouveau_type_medicament) || empty($nouveau_Prix) || empty($nouvelle_Quantite)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $query = $con->prepare('UPDATE medicamment SET nom_medicament = :nouveau_nom_medicament, type_medicament = :nouveau_type_medicament, Prix = :nouveau_Prix, Quantite = :nouvelle_Quantite WHERE nom_medicament = :nom_medicament');
        $query->execute(array('nouveau_nom_medicament' => $nouveau_nom_medicament, 'nouveau_type_medicament' => $nouveau_type_medicament, 'nouveau_Prix' => $nouveau_Prix, 'nouvelle_Quantite' => $nouvelle_Quantite,'nom_medicament'=>$nom_medicament));
        
        echo "<script>alert('Les informations du client ont été mises à jour avec succès !')</script>";
        header('location: medicaments.php');
    }
}
?>
