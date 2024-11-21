<?php
    $connect = mysqli_connect("localhost", "root", "", "blog");

    $query = mysqli_query($connect, "SELECT * FROM article");
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header class="bg-secondary p-4">

        <h1 class="text-center"><a href=".">BLOG IPSSI</a></h1>

        <div class="text-end">
            <a href="ajouter.php" class="text-light">Administration</a>
        </div>
    </header>
    <main class="container-fluid">
        <h1 class="text-center">Liste article</h1>

        <?php while($article = $query->fetch_assoc()): ?>
            <h3 class="text-success">
                <a href="article.php?id=<?= $article['id'] ?>"><?= $article['titre'] ?></a>
            </h3>
            <p><?= $article['contenu'] ?></p>
            <div><?= $article['datecreation'] ?> </div>

            <hr>
        <?php endwhile; ?>
    </main>

    <footer class="text-center bg-secondary p-4 mt-5">
        &copy; - BLOG - IPSSI
    </footer>
    
</body>
</html>