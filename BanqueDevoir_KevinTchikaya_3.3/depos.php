<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dépôts et Retraits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banque";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $action = $_POST['action'];
    $numeroCompte = 'FR768765432109876543';

    $sql = "SELECT solde FROM comptebancaire WHERE numeroCompte = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $numeroCompte);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $solde = $row['solde'];

    if ($action == 'deposit') {
        $solde += $amount;
    } elseif ($action == 'withdraw') {
        if ($amount > $solde) {
            die("Solde insuffisant pour effectuer le retrait.");
        }
        $solde -= $amount;
    }

    $sql = "UPDATE comptebancaire SET solde = ? WHERE numeroCompte = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $solde, $numeroCompte);

    if ($stmt->execute()) {
        echo "Transaction réussie! Nouveau solde: " . $solde;
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
    <div class="container">
        <h1>Dépôts et Retraits</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="amount">Montant</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <button type="submit" name="action" value="deposit">Dépôt</button>
            <button type="submit" name="action" value="withdraw">Retrait</button>
            <button onclick="location.href='Dashboard.php'">Retour</button>
        </form>
    </div>
</body>
</html>
