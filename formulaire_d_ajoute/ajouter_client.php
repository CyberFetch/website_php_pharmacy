<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	  <script src="bootstrap/js/jquery.min.js"></script>
	  <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

<div class="sidebar">
  <img src="../icons/profile.png" style="width: 130px; height: 120px; margin-left: 50px; margin-bottom: 30px">
  <a href="../index.php" id="side"><i class="fas fa-tachometer-alt" ></i> Dashboard</a>
  <a href="../utilisateurs.php" id="side"><i class="fas fa-users" ></i> Utilisateurs</a>
  <a href="../medecine.php" id="side"><i class="bi bi-bag-plus-fill"></i> Médecine</a>
  <a href="../medicaments.php" id="side"><i class="fas fa-pills"></i>Médicaments</a>
  <form method="post" action="">
    <a href="../login.php"><button type="submit" name="logout" id="side"><i class="bi bi-door-closed-fill"></i> Déconnecter</button></a>
  </form>
  <?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit;
}
?>
</div>

<div class="content">
<h1 style="text-align: center;">Ajouter un client </h1>
<form action="" method="post">
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">Nom client :</label>
    <input type="text" class="form-control" placeholder="Name" name="nomclient" required/>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for=""> Numero dossier  :</label>
    <input type="text" class="form-control" name="numero_dossier" placeholder="RXXXXXXXXX" required>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">nom de medicament :</label>
    <textarea class="form-control" placeholder="les noms des médicaments achetées"  name="nom_medicament" required></textarea>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="">addresse :</label>
    <input type="text" class="form-control" placeholder=" adresse de contact " name="addresse" required>
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

                                                                    <!-- php -->
<?php
require('../connexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomclient = $_POST["nomclient"];
    $numero_dossier = $_POST["numero_dossier"];
    $nom_medicament = $_POST["nom_medicament"];
    $addresse = $_POST["addresse"];

    $sql = "INSERT INTO client (nomclient, numero_dossier, nom_medicament, addresse) VALUES (:nomclient, :numero_dossier, :nom_medicament, :addresse)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':nomclient', $nomclient);
    $stmt->bindParam(':numero_dossier', $numero_dossier);
    $stmt->bindParam(':nom_medicament', $nom_medicament);
    $stmt->bindParam(':addresse', $addresse);

    if ($stmt->execute()) {
        echo "<script>alert('Les données ont été ajoutées avec succès.')</script>";
    } else {
        echo "<script>alert('Erreur lors de l'insertion des données')</script>";
    }
}

?>


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

#photo1{
    width: 700px;
    height: 500px;
}
a button{
  border: none;
  margin-left: 25px;
  background-color: green;

}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
     require('./logout.php');
?>
</body>
</html>