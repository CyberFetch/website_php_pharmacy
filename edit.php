<?php
require('connexion.php');

if(isset($_POST['edit_id'])) {
    $nomclient = $_POST['edit_id'];

    $sql = "SELECT * FROM client WHERE nomclient = :nomclient";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nomclient', $nomclient);

    if($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Erreur lors de la récupération des informations du client.";
    }
}
?>

<!-- Votre code HTML -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <h2 style="text-align: center;">Modifier les informations du client</h2>
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
            </div>

            <div class="col col-md-12">
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['nomclient']; ?>">
                    <input type="text" name="nouveau_nomclient" value="<?php echo $row['nomclient']; ?>" placeholder="Nom du client"required>
                    <input type="text" name="nouveau_numero_dossier" value="<?php echo $row['numero_dossier']; ?>" placeholder="Numéro de dossier"required>
                    <input type="text" name="nouveau_nom_medicament" value="<?php echo $row['nom_medicament']; ?>" placeholder="Nom du médicament"required>
                    <input type="text" name="nouvelle_adresse" value="<?php echo $row['addresse']; ?>" placeholder="Adresse"required>
                    <button type="submit" class="btn btn-info btn-sm" name="update_btn">
                        <i class="bi bi-pencil"></i> Mettre à jour
                    </button>
                </form>
            </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">
    </div>
</div>
<?php
require('connexion.php');

if(isset($_POST['update_btn'])) {
    $nomclient = $_POST['edit_id'];
    $nouveau_nomclient = $_POST['nouveau_nomclient'];
    $nouveau_numero_dossier = $_POST['nouveau_numero_dossier'];
    $nouveau_nom_medicament = $_POST['nouveau_nom_medicament'];
    $nouvelle_adresse = $_POST['nouvelle_adresse'];
    
    if(empty($nouveau_nomclient) || empty($nouveau_numero_dossier) || empty($nouveau_nom_medicament) || empty($nouvelle_adresse)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $query = $con->prepare('UPDATE client SET nomclient = :nouveau_nomclient, numero_dossier = :nouveau_numero_dossier, nom_medicament = :nouveau_nom_medicament, addresse = :nouvelle_adresse WHERE nomclient = :nomclient');
        $query->execute(array('nouveau_nomclient' => $nouveau_nomclient, 'nouveau_numero_dossier' => $nouveau_numero_dossier, 'nouveau_nom_medicament' => $nouveau_nom_medicament, 'nouvelle_adresse' => $nouvelle_adresse, 'nomclient' => $nomclient));
        
        echo "<script>alert('Les informations du client ont été mises à jour avec succès !')</script>";
        header('location: utilisateurs.php');
    }
}
?>
