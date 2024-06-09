<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>ajouter_medecine</title>
</head>
<body>



<div class="sidebar">
  <img src="../icons/profile.png" style="width: 130px; height: 120px; margin-left: 50px; margin-bottom: 30px">
  <a href="../index.php" id="side"><i class="fas fa-tachometer-alt" ></i> Dashboard</a>
  <a href="../utilisateurs.php" id="side"><i class="fas fa-users" ></i> Utilisateurs</a>
  <a href="../medecine.php" id="side"><i class="bi bi-bag-plus-fill"></i> Médecine</a>
  <a href="../medicaments.php" id="side"><i class="fas fa-pills"></i>Médicaments</a>
  <form method="post" action="../application_gestion_pharmacie/login.php?logout=true">
    <a href="../application_gestion_pharmacie/login.php"><button type="submit" name="logout" id="side"><i class="bi bi-door-closed-fill"></i> Déconnecter</button></a>
  </form>
</div>
<div class="content">
<h1 style="text-align: center;">Ajouter un medicament </h1>
<form action="" method="post">
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Nom medicament :</label>
    <input type="text" class="form-control" placeholder="Nom de médicament arrivées" name="nom_medicament" required/>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for=""> type de medicament  :</label>
    <input type="text" class="form-control" placeholder="le type de medicamment" name="type_medicament"required>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Prix :</label>
    <textarea class="form-control" placeholder="Prix de medicamment"  name="Prix" required></textarea>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Quantite :</label>
    <input type="number" class="form-control" placeholder="0" name="Quantite"  required/>
  </div>
</div>

<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto">
    <button class="btn btn-primary" name="Envoyer">Ajouter</button>
  </div>
</div>
</form>
</div>

<style>
.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #2f9c1e;
    padding-top: 20px;
}
form a button{
  background-color: green;
  border: none;
  margin-left: 25px;

}
form a:hover{
  background-color: green;
}

.content {
    margin-left: 240px;
    padding: 20px;
    background-color: #ffffff;

}

.content h4{
  font-size: 30px;
}
.sidebar a {
    padding: 10px;
    font-size: 18px;
    color: #fff;
    display: block;
    text-decoration: none;
}

.sidebar a:hover {
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    text-decoration: none;
}
.content h2 {
    margin-bottom: 20px;
    margin-left: 100px;
}
</style>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
        require("../connexion.php");
    if(isset($_POST['Envoyer'])) {
        $nom_medicament = $_POST['nom_medicament'];
        $type_medicament = $_POST['type_medicament'];
        $prix = $_POST['Prix'];
        $Quantite = $_POST['Quantite'];
    
        $sql = "INSERT INTO medicamment (nom_medicament, type_medicament, Prix, Quantite) VALUES (:nom_medicament, :type_medicament, :Prix, :Quantite)";
        $stmt = $con->prepare($sql);
        
        $stmt->bindParam(':nom_medicament', $nom_medicament);
        $stmt->bindParam(':type_medicament', $type_medicament);
        $stmt->bindParam(':Prix', $prix);
        $stmt->bindParam(':Quantite', $Quantite);
    
        if($stmt->execute()) {
            echo  "<script>alert('Medicament ajouté avec succès !')</script>";
        } else {
            echo "<script>alert('Erreur, le médicament n'a pas été ajouté')</script>";
        }
    }
    ?>
    