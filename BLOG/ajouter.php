<?php
    $connect = mysqli_connect("localhost", "root", "", "blog");

    if( isset($_POST['article'])){
        extract($_POST);
        $query = "INSERT INTO article VALUES(NULL, '$article', '$contenu', Now())";

        mysqli_query($connect, $query);
        header("location: .");
        exit;       
    }
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
        <h1 class="text-center">Ajouter un nouvel article</h1>
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Article</label>
                <input type="text" name="article" class="form-control">
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