<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Client</title>
    <!-- Lien vers Bootstrap pour des styles modernes -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];


}
session_start();
$conn = new mysqli('localhost', 'root', '', 'banque');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //$sql = "SELECT * FROM client WHERE email = ? AND mdp = ?";
    $sql = "SELECT ClientId, mdp FROM client WHERE email = ?";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param('ss', $email, $mdp);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}

?>

<div class="container">
    <h2 class="text-center">Connexion</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">CONNEXION</button>

    </form>
</div>


</body>
</html>