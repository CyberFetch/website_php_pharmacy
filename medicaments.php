<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="js/manage_customer.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>

  </head>
  <body style="max-height: 100%;">


    <div class="sidebar">
  <img src="icons/profile.png" style="width: 130px; height: 120px; margin-left: 50px; margin-bottom: 30px">
  <?php 
  require("connexion.php");
  
if (isset($_POST["delete_name"])) {
  $nom_medicament = $_POST['delete_name'];
  $sql = 'DELETE FROM medicamment WHERE nom_medicament = :nom_medicament';
  $stm = $con->prepare($sql);
  $stm->bindParam(':nom_medicament', $nom_medicament); // Bind the parameter
  $stm->execute();
  echo"<script>alert('la ligne à supprimer avec succès')</script>";
}
//----------------------------------------------------editer-----------------------------------------------------


?>
  <a href="index.php" id="side"><i class="fas fa-tachometer-alt" ></i> Dashboard</a>
  <a href="utilisateurs.php" id="side"><i class="fas fa-users" ></i> Utilisateurs</a>
  <a href="medecine.php" id="side"><i class="bi bi-bag-plus-fill"></i> Médecine</a>
  <a href="medicaments.php" id="side"><i class="fas fa-pills"></i>Médicaments</a>
  <form method="post" action="formulaire_d_ajoute/logout.php">
    <a href="login.php"><button type="submit" name="logout" id="side"><i class="bi bi-door-closed-fill"></i> Déconnecter</button></a>
  </form>
</div>
<div class="content">
    <div class="container">
        <div class="row">
          <div class="col col-md-12">
            <h2 style="text-align: center;">Liste des medicamments enregistrées</h2>
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>
          <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
            	<table class="table table-bordered table-striped table-hover">
            		<thead>
            			<tr>
            				<th style="width: 30%; text-align:center;">Nom medicament </th>
                    <th style="width: 30%; text-align:center;">type de medicament  </th>
            				<th style="width: 13%; text-align:center;">Prix  </th>
                    <th style="width: 13%; text-align:center;">Quantite  </th>
                    <th style="width:20%; text-align:center;">Paramètres</th>
            			</tr>
            		</thead>
                    <tbody>
                            <?php
                            require('connexion.php');
                                $sql = "SELECT nom_medicament,type_medicament,Prix,Quantite from medicamment";
                                $stm = $con->prepare($sql);
                                $stm->execute();
                                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <?php foreach($result as $row):?>
                                <tr>
                                    <td><?php echo $row['nom_medicament'] ;?></td>
                                    <td><?php echo $row['type_medicament'] ; ?></td>
                                    <td><?php echo $row['Prix'] ;?></td>
                                    <td><?php echo $row['Quantite'] ; ?></td>
                                    <td>
                                        <form action="edit_medicament.php" method="post">
                                            <input type="hidden" name="edit_nom" value="<?php echo $row['nom_medicament']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm" name="edit_btn">
                                              <i class="bi bi-pencil"></i>
                                            </button>
                                        </form>
                                        <form action="" method="post">
                                            <input type="hidden" name="delete_name" value="<?php echo $row['nom_medicament']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" name="delete_btn">
                                              <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                    </tbody>
  </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!-- ----------------------------------------------------------------CSS--------------------------------------------------------- -->

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










