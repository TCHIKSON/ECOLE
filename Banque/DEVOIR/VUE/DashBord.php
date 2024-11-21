<?php
function board(){
    header_register_callback('location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Compte Bancaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            padding: 15px;
            text-align: left;
            display: block;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .account-info {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">🏠 Accueil</a>
        <a href="#">💼 Mes comptes</a>
        <a href="#">💳 Virements</a>
        <a href="#">💸 Dépôts / Retraits</a>
        <a href="#">📊 Solde & Historique</a>
        <a href="#">⚙️ Paramètres</a>
        <a href="#">🚪 Déconnexion</a>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <h1>Bienvenue sur votre espace bancaire</h1>
        </div>

        <!-- Informations du compte -->
        <div class="account-info">
            <h2>Informations sur le compte</h2>
            <p><strong>Titulaire :</strong> Jean Dupont</p>
            <p><strong>Numéro de compte :</strong> FR76 1234 5678 9012 3456 7890</p>
            <p><strong>Solde actuel :</strong> 1 250,00 €</p>
            <a href="#" class="btn btn-primary">Consulter les opérations</a>
        </div>

        <!-- Section pour actions rapides -->
        <div class="row">
            <div class="col-md-4">
                <div class="account-info">
                    <h3>Effectuer un virement</h3>
                    <p>Envoyez de l'argent à d'autres comptes en quelques clics.</p>
                    <a href="#" class="btn btn-primary">Faire un virement</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="account-info">
                    <h3>Dépôt / Retrait</h3>
                    <p>Ajoutez ou retirez de l'argent de votre compte.</p>
                    <a href="#" class="btn btn-primary">Effectuer un dépôt ou retrait</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="account-info">
                    <h3>Historique</h3>
                    <p>Consultez l'historique de toutes vos transactions.</p>
                    <a href="#" class="btn btn-primary">Voir l'historique</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
