<script>
function validateForm() {
    var numCompte = document.getElementById("numeroCompte").value;
    var solde = document.getElementById("solde").value;
    var typeDeCompte = document.getElementById("typeDeCompte").value;
    var mdp = document.getElementById("mdp").value;

    if (numCompte.length < 5 || numCompte.length > 15) {
        alert("Le numéro de compte doit contenir entre 5 et 15 caractères.");
        return false;
    }

    if (solde < 10 || solde > 2000) {
        alert("Le solde doit être compris entre 10 et 2000.");
        return false;
    }

    if (!["courant", "epargne", "entreprise"].includes(typeDeCompte)) {
        alert("Le type de compte doit être 'courant', 'épargne' ou 'entreprise'.");
        return false;
    }

    if (mdp.includes(" ")) {
        alert("Le mot de passe ne doit pas contenir d'espaces.");
        return false;
    }

    return true;
}
</script>