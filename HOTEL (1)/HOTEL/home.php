
    <h2 class="text-center">Réserver une chambre</h2>

<div class="row">
    <?php foreach($chambres as $chambre): ?>
    <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" src="public/img/<?= $chambre->getImage(); ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $chambre->getPrix(); ?>€</h5>

            <p class="card-text">Some quick example ...</p>

            <a href="?action=reserver&id=<?= $chambre->getNumChambre(); ?>" class="btn btn-primary">Réserver</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>