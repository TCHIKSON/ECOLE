<?php
    $connect = mysqli_connect("localhost", "root", "", "blog");
    
    $query = mysqli_query($connect, "SELECT * FROM article WHERE id = ".$_GET['id']);

    $art = mysqli_fetch_assoc($query);

    $queryCommentByArt = mysqli_query($connect, "SELECT * FROM comment WHERE id_article = " . $art['id']);
?>
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
    <h1 class="text-center"><a href=".">BLOG</a></h1>
        <div class="text-end">
            <a href="ajouter.php" class="text-light">Administration</a>
        </div>
    </header>
    <main class="container-fluid">
        <h1 class="text-center">Articel <?= $art['titre'] ?></h1>
        <h2 class="text-success">
            <a href="article.php"><?= $art['titre'] ?></a>
        </h2>
        <p><?= $art['contenu'] ?> </p>
        <div>Créé le <?= $art['datecreation'] ?> </div>

        <hr>

        <?php while($comment = $queryCommentByArt->fetch_assoc()): ?>
       
        <p style="width: 50%;"><?= $comment['contenu'] ?> </p>
        <p>le <?= $comment['datecomment'] ?></p>

        <hr>
        <?php endwhile; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="">Pseudo</label>
                <input type="text" name="pseudo" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contenu</label>
                <textarea name="contenu" class="form-control"></textarea>
            </div>

            <input type="submit" class="btn btn-success mt-3">
        </form>

        
    </main>

    <footer class="text-center bg-secondary p-4 mt-5">
        BLOG - IPSSI
    </footer>
    
</body>
</html>