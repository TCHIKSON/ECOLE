
    <h2 class="text-center">Liste de chambre</h2>

    <table class="table table-striped">
        <tr class="table-dark">
            <th>Image</th>
            <th>Prix</th>
            <th>Lits</th>
            <th>Action</th>
        </tr>

        <?php foreach($chambres as $chambre): ?>
            <tr>
                <td style="width: 80px !important;"> 
                    <img style="width: 90%;" src="public/img/<?= $chambre->getImage(); ?>" alt="">
                </td>
                <td><?= $chambre->getPrix(); ?></td>
                <td><?= $chambre->getNbLits(); ?></td>
                <td>
                    <a href="?action=update&id=<?= $chambre->getNumChambre() ?>">Update</a>
                    <a href="?action=delete&id=<?= $chambre->getNumChambre() ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>