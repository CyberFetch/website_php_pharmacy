<?php
// Fonction de recherche des clients
function searchCustomer($text) {
  require "../connexion.php"; // Assurez-vous que le chemin d'accès est correct
  if($conn) {
    $seq_no = 0;
    $query = "SELECT * FROM utilisateurs WHERE UPPER(nom) LIKE '%$text%'";
    $result = $conn->query($query);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $seq_no++;
      showCustomerRow($seq_no, $row); // Appel de la fonction d'affichage des données du client
    }  
  }
}
