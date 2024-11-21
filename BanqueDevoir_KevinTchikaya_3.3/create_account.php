<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banque";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['numeroCompte'], $_POST['solde'], $_POST['typeDeCompte'])) {
        
        $accountNumber = htmlspecialchars($_POST['numeroCompte']);
        $solde = floatval($_POST['solde']);
        $accountType = htmlspecialchars($_POST['typeDeCompte']);

       
        if (strlen($accountNumber) < 5 || strlen($accountNumber) > 21) {
            die("Le numéro de compte doit contenir entre 5 et 21 caractères.");
        }

        
        if ($solde < 10 || $solde > 2000) {
            die("Le solde doit être compris entre 10 et 2000.");
        }

     
        if (!in_array($accountType, ['courant', 'epargne', 'entreprise'])) {
            die('Le type de compte doit être "courant", "épargne" ou "entreprise".');
        }

        $sql = "INSERT INTO comptebancaire (numeroCompte, solde, typeDeCompte) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $accountNumber, $solde, $accountType);

    
        if ($stmt->execute()) {
            
            header("Location: Dashboard.php");
            exit();
        } else {
            echo "Erreur : " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Toutes les données requises ne sont pas disponibles.";
    }
}
$conn->close();
?>

    <div class="container">
        <h1>Créer un Compte</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="numeroCompte">Numéro de compte</label>
                <input type="text" id="numeroCompte" name="numeroCompte" required>
            </div>
            <div class="form-group">
                <label for="solde">Solde</label>
                <input type="number" id="solde" name="solde" required>
            </div>
            <div class="form-group">
                <label for="typeDeCompte">Type de compte</label>
                <select id="typeDeCompte" name="typeDeCompte" required>
                    <option value="courant">Courant</option>
                    <option value="epargne">Épargne</option>
                    <option value="entreprise">Entreprise</option>
                </select>
            </div>
            <button type="submit">Créer un compte</button>
            <button type="button" onclick="location.href='Dashboard.php'">Annuler</button>
        </form>
    </div>
</body>
</html>
