<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virements</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Virements</h1>
    <form action="transfer_process.php" method="post">
        <div class="form-group">
            <label for="transferAmount">Montant du virement</label>
            <input type="number" id="transferAmount" name="transferAmount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="transferAccount">Compte de destination</label>
            <select id="transferAccount" name="transferAccount" class="form-control" required>
                <?php
                //je me connecte à l bd
                $servername = "localhost";
                $username = "root";  
                $password = "";            
                $dbname = "banque";  
                $conn = new mysqli($servername, $username, $password, $dbname);

            
                $sql = "SELECT numeroCompte FROM comptebancaire";
                $result = $conn->query($sql);
            
        
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['numeroCompte'] . '">' . $row['numeroCompte'] . '</option>';
                }
                
                $conn->close();
                ?>
            </select>
        </div>
        <button type="submit">Envoyer</button>
        <button onclick="location.href='Dashboard.php'" >Annuler</button>
    </form>
</div>

</body>
</html>
