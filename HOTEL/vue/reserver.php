
    <h2 class="text-center">Reserver</h2>

    <img src="public/img/<?= $chambre->getImage(); ?>" alt="">
    <p><?= $chambre->getPrix(); ?></p>

    <form action="" method="POST">
        <input type="hidden" value="<?= $chambre->getNumChambre(); ?>" name="numChambre">
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" name="prenom" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Téléphone</label>
                <input type="text" name="tel" class="form-control" value="010101010">
            </div>

            <hr>
            
            <div class="form-group">
                <label for="">Date d'arrivée</label>
                <input type="date" name="dateArrivee" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Date départ</label>
                <input type="date" name="dateDepart" class="form-control">
            </div>


            <input type="submit" class="btn btn-success mt-3">
        </form>