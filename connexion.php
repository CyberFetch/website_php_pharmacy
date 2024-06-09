<?php
try {
    $dsn = "mysql:host=localhost;dbname=pharmacie";
    $username = "root";
    $password = "";
    $con = new PDO($dsn, $username, $password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
