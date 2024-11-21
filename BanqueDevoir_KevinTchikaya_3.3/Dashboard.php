<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer le solde actuel
$sql = "SELECT solde FROM comptebancaire WHERE numeroCompte = 'FR768765432109876543'"; 
$result = $conn->query($sql);
$solde = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $solde = $row['solde'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Bancaire</title>
    <link rel="stylesheet" href="style.css">


    
    <script>
        function AjoutClient() {
            window.location.href = "crateNewClient.php"
        }
    </script>
    <script>
        function CreerUnCompte() {
            window.location.href = "create_account.php"
        }
    </script>
    <script>
        function DepotsEtRetraits() {
            window.location.href = "depos.php"
        }
    </script>
</head>
<body>  
<button calss = "deconnexion" onclick="location.href='index.php'">Déconnection</button>


<h1>Tableau de Bord Bancaire</h1>
<div class="solde">
            <h2>Solde actuel</h2>
            <div class ="container solde"><p id="currentsolde"><?php echo $solde; ?> €</p></div>
        </div>
    <div class="container">
        
        <button onclick= 'CreerUnCompte()'>Créer un compte</button>
        <button onclick= 'AjoutClient()'>Ajouter un client</button>
        <button onclick= 'DepotsEtRetraits()'>Dépôts et Retraits</button>
        <button onclick="location.href='transfer.php'">Virements</button>
                
    </div>
</body>
</html>
