<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Application bancaire</title>
</head>
<body>

    <header class="bg-secondary p-4">
        <nav>
            <a href="." class="btn btn-success">Accueil</a>

            <!-- Si l'utilisateur est connecté -->
            <?php if( isset($_SESSION['client']) ): ?>
                <?php $user = unserialize($_SESSION['client']); ?>                
                    <a href="?action=ajouterCompte" class="btn btn-success">Ajouter un compte</a>
                    <a href="?action=listerComptes" class="btn btn-success">Liste des comptes</a>
                    <a href="?action=listerClients" class="btn btn-success">Liste des clients</a>             
                    <a href="?action=dashboard" class="btn btn-success">Tableau de bord</a>
                    <a href="?action=listeTransactions" class="btn btn-success">Historique des transactions</a>
                    <a href="?action=logout" class="btn btn-danger">Déconnexion</a>
                    
            <?php else: ?>
                <!-- Si l'utilisateur n'est pas connecté, afficher le bouton de connexion -->
                <a href="?action=login" class="btn btn-primary">Connexion</a>
            <?php endif; ?>
        </nav>
        
    </header>
    <main class="container-fluid my-3">
        <!-- Inclusion du contenu dynamique -->
        <?= $content ?? ''; ?>
    </main>
    <footer class="bg-secondary p-3 mt-2 text-center">
        &copy; IPSSI - 2024
    </footer>
    
</body>
</html>
