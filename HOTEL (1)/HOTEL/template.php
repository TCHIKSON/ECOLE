<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header class="bg-secondary p-4">
        <nav>
            <a href="." class="btn btn-success">Accueil</a>

            <?php if( isset($_SESSION['user']) ): ?>
                <?php if( unserialize($_SESSION['user'])->getRole() == "administrateur" ): ?>
                <a href="?action=ajouter" class="btn btn-success">Ajouter</a>
                <a href="?action=lister" class="btn btn-success">Liste Chambre</a>
                <?php endif; ?>
            <a href="" class="btn btn-success">Liste Réservation</a>
            <a href="" class="btn btn-success">Liste Client</a>
            <a href="?action=logout" class="btn btn-danger">Déconnexion</a>
            <?php else: ?>
            <a href="?action=login" class="btn btn-success">Connexion</a>
            <?php endif; ?>
            <span> 
                <?= isset($_SESSION['user']) ? unserialize($_SESSION['user'])->getRole() : '' ?> 
            </span>
        </nav>
        
    </header>
    <main class="container-fluid my-3">
        <?= $content ?? ''; ?>
    </main>
    <footer class="bg-secondary p-3 mt-2 text-center">
        &copy; IPSSI - 2024
    </footer>
    
</body>
</html>