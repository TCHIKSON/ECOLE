
    <h2 class="text-center">Ajouter une chambre</h2>

    <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">prix</label>
                <input type="number" name="prix" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Lits</label>
                <input type="number" name="nbLits" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Capacité</label>
                <input type="number" name="nbPers" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>

            <input type="submit" class="btn btn-success mt-3">
        </form>