<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
<div class="sidebar">
  <img src="icons/profile.png" style="width: 130px; height: 120px; margin-left: 50px; margin-bottom: 30px">
  <?php 
  require("connexion.php");
    ?>
  <a href="#" id="side"><i class="fas fa-tachometer-alt" ></i> Dashboard</a>
  <a href="utilisateurs.php" id="side"><i class="fas fa-users" ></i> Utilisateurs</a>
  <a href="medecine.php" id="side"><i class="bi bi-bag-plus-fill"></i> Médecine</a>
  <a href="medicaments.php" id="side"><i class="fas fa-pills"></i>Médicaments</a>
  <form method="post" action="login.php?logout=true">
    <a href="login.php"><button type="submit" name="logout" id="side"><i class="bi bi-door-closed-fill"></i> Déconnecter</button></a>
  </form>
</div>

<div class="content">
    <img src="icons/home.png" id="home" style="width: 40px; height:auto;float:left; margin:0%">
    <h3 style="margin-top: 6px;">Dashboard</h3><br>
    <img src="logo.png" alt="Logo" id="Logo" style="width: 160px; height:120px; margin-left:400px">
    <h4 style=" display:inline-block;">PHARMACIE AL QONDOSS</h4>
    <hr style="border:2px solid; width:80%;">
    <h1 style="text-align: center; margin-top: 30px;">BIENVENUE SUR NOTRE PHARMACIE</h1>
    <div class="container">
  <div class="row">
    
    <div class="col-md-4">
      <a href="formulaire_d_ajoute/ajouter_client.php" style="text-decoration: none;">
      <div  class="card card-1">
        <img src="icons/ajouter-un-ami.png"></i>
        <h3 class="title p-5">ajouter un client</h3>
      </div>
    </a>
    </div>
    
    <div class="col-md-4">
      <a href="formulaire_d_ajoute/ajouter_medecine.php" style="text-decoration: none;">
      <div  class="card card-1">
        <img src="icons/icon ajouteM.png"></i>
        <h3 class="title p-5">ajouter un medecine</h3>
      </div>
    </a>
    </div>
    <div class="col-md-4">
      <a href="./formulaire_d_ajoute/ajouter_medicament.php " style="text-decoration: none;">
      <div  class="card card-1">
        <img src="icons/medicament.png"></i>
        <h3 class="title p-5">ajouter un medicament</h3>
      </div>
    </a>
    </div>
  </div>
</div>

<div>
  <div class="row">
    <div class="col-md-6">
      <img src="affichage1.jpg" style="width: 700px; height:600px;">
    </div>
    <div class="col-md-6">
      <p class="text" style="font-size: 25px; font-weight:600; margin-left: 95px; color:black; margin-top:30px;">Notre pharmacie s'engage à fournir des services de santé et des produits pharmaceutiques de qualité,<br>
        tout en offrant un service client exceptionnel. Nous mettons l'accent sur la satisfaction et le bien-être de nos clients en proposant 
        une gamme étendue de médicaments, de produits de santé et de conseils professionnels.

Lorsque les clients entrent dans notre pharmacie, ils sont accueillis par une équipe chaleureuse et compétente de professionnels de la santé,
 prêts à répondre à leurs besoins et à leurs questions.</p>
    </div>
  </div>
</div>
</div>








<!-- --------------------------------------------------------------CSS !!!!------------------------------------------------------------------ -->
<style>
  body{
  font-family: 'Nunito', sans-serif;
  padding: 50px;
}
.card{
    border-radius: 4px;
    background: #fff;
    box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
    transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
  padding: 14px 80px 18px 36px;
  cursor: pointer;
}

.card:hover{
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}

.card h3{
  font-size: 15px;
  margin-top: 70px;
  text-align: center;
  margin-left: 10px;
  color: black;
}

.card img{
  position: absolute;
  top: 20px;
  right: 155px;
  max-height: 90px;
  
}

.card-1{
    background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
    width: 380px;
    height: 200px;
}

.card-2{
    background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
    width: 380px;
    height: 200px;
}

.card-3{
      background-repeat: no-repeat;
    background-position: right;
    background-size: 80px;
    width: 380px;
    height: 200px;
}

@media(max-width: 990px){
  .card{
    margin: 20px;
  }
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

</body>
</html>


