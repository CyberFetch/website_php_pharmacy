<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pharmacie</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <?php
        session_start(); // Démarrez la session en premier
        
        if(isset($_SESSION['name'])) {
            header("Location: index.php");
            exit();
        }



//     if(isset($_SESSION['name'])) {

//      header("Location: index.php");
//     exit();
//  }
// Vérifier si le formulaire a été soumis
if(isset($_POST["submit"])) {
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Comparaison avec les valeurs de la base de données
    if($name === "Hassan Es-sabbani" && $email === "hassanessabbani927@gmail.com" && $password === "hassan.1234") {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        
        // Rediriger l'utilisateur vers la page souhaitée
        header("Location: index.php");
        exit(); // Assure que le script s'arrête ici pour éviter toute exécution supplémentaire
    } else {
        $error = "Identifiants incorrects";
    }
}






require_once('connexion.php');

// session_start();

if (isset($_POST['logout'])) {
    session_destroy(); 
    header('Location: login.php');
}

require('connexion.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        body {
            background-image: url(m.jpg);
        }
    </style>
    <div class="main mt-5">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <?php if(isset($error)) { ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                        <?php } ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Saisir votre nom et prenom">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Saisir votre email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="mot de passe">
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Connexion">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
