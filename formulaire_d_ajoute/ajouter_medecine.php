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
<?php

if(isset($_POST["Envoyer"])) {
    require('../connexion.php');

    $nom = $_POST["nom"]; 
    $domaine = $_POST["domaine"];
    $addresse = $_POST["addresse"];
    $cabinet = $_POST["cabinet"];
    $contact = $_POST["contact"];

    $sql = "INSERT INTO medecine (nom, domaine, addresse, cabinet, contact) 
            VALUES (:nom, :domaine, :addresse, :cabinet, :contact)";
    $stmt = $con->prepare($sql);

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':domaine', $domaine);
    $stmt->bindParam(':addresse', $addresse);
    $stmt->bindParam(':cabinet', $cabinet);
    $stmt->bindParam(':contact', $contact);

    if ($stmt->execute()) { 
        echo "<script>alert('Les données ont été ajoutées avec succès.');</script>";
    } else {
        echo "<script>alert('Une erreur s'est produite lors de l'insertion des données.')</script>";
    }
}
?>

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
<h1 style="text-align: center;">Ajouter un medecine </h1>
<form action="" method="post">
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Nom medecine :</label>
    <input type="text" class="form-control" placeholder="Name" name="nom" required/>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for=""> domaine  :</label>
    <input type="text" class="form-control" name="domaine" placeholder="Entrer votre spécialité">
  </div>
</div>


<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Address :</label>
    <textarea class="form-control" placeholder="Address"  name="addresse"></textarea>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Cabinet name :</label>
    <input type="text" class="form-control" placeholder=" Nom du médecine" name="cabinet">
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Contact :</label>
    <textarea class="form-control" placeholder="l'adresse de médecine" name="contact" ></textarea>
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