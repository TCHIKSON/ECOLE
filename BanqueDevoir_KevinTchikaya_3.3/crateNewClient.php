<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banque";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : null;
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : null;
    $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : null;
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $mdp = $_POST['mdp'];

    if ($nom && $prenom && $telephone && $email && $mdp) {

        $sql = "INSERT INTO client (nom, prenom, telephone, email, mdp) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nom, $prenom, $telephone, $email, $mdp);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "<div class='alert alert-danger text-center'>Erreur lors de l'ajout du client : " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-warning text-center'>Veuillez remplir tous les champs requis.</div>";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2 class="text-center">S’inscrire</h2>
    <form action="crateNewClient.php" method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">S’inscrire</button>
        <button type="button" onclick="location.href='Dashboard.php'" class="btn btn-secondary btn-block mt-4">Annuler</button>
    </form>
</div>

</body>
</html>
