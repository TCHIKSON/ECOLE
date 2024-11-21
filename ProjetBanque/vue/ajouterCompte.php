<h2 class="text-center">Créer un compte bancaire</h2>

<form action="" method="POST">
    <div class="form-group">
        <label for="solde">Solde initial</label>
        <input type="number" name="solde" class="form-control" min="10" max="2000" required>
    </div>
    
    <div class="form-group">
        <label for="typeDeCompte">Type de compte</label>
        <select name="typeDeCompte" class="form-control" required>
            <option value="courant">Courant</option>
            <option value="epargne">Épargne</option>
            <option value="entreprise">Entreprise</option>
        </select>
    </div>

    <div class="form-group">
        <label for="numeroCompte">Numéro de compte</label>
        <input type="text" name="numeroCompte" class="form-control" minlength="5" maxlength="15" required>
    </div>

    <input type="submit" class="btn btn-success mt-3" value="Créer un compte">
</form>
