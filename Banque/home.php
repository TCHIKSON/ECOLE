<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header class="bg-secondary p-4 text-center mb-4">
        <h1>Accueil - Compte bancaire</h1>
        <nav>
            <a href="index.php" class="btn btn-success">Accueil</a>
            <a href="index.php?action=new" class="btn btn-success">New Compte</a>
            <a href="index.php?action=deposer" class="btn btn-success">Déposer</a>
            <a href="index.php?action=retirer" class="btn btn-success">Retirer</a>
            <a href="index.php?action=virer" class="btn btn-success">Virer</a>
        </nav>
    </header>
    <main class="container-fluid">
        <table class="table table-striped">
            <tr class="table-dark">
                <th>Titulaire</th>
                <th>Solde</th>
                <th>Action</th>
            </tr>

            <?php foreach($tab as $banque): ?>
                <tr>
                    <td> <?= $banque->getTitulaire(); ?> </td>
                    <td> <?= $banque->getSolde(); ?> </td>
                    <td>
                        <a href="?action=update&id=<?= $banque->getId(); ?>">update</a>
                        <a href="?action=delete&id=<?= $banque->getId(); ?>">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </main>
    
</body>
</html>