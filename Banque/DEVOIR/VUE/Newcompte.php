<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <script>
        // Validation du formulaire à la soumission
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', function (event) {
                let nom = document.getElementById('nom').value;
                let prenom = document.getElementById('prenom').value;
                let telephone = document.getElementById('telephone').value;
                let email = document.getElementById('email').value;
                let mdp = document.getElementById('mdp').value;

                let errorMessages = '';

                // Validation du nom (doit être non vide)
                if (nom.trim() === '') {
                    errorMessages += 'Le champ "Nom" est obligatoire.<br>';
                }

                // Validation du prénom (doit être non vide)
                if (prenom.trim() === '') {
                    errorMessages += 'Le champ "Prénom" est obligatoire.<br>';
                }

                // Validation du numéro de téléphone (doit contenir au moins 10 chiffres)
                const phonePattern = /^[0-9]{10}$/;
                if (!telephone.match(phonePattern)) {
                    errorMessages += 'Le numéro de téléphone doit contenir 10 chiffres.<br>';
                }

                // Validation de l'email (HTML5 prend déjà en charge la validation de l'email)
                if (email.trim() === '') {
                    errorMessages += 'Le champ "Email" est obligatoire.<br>';
                }

                // Validation du mot de passe (pas d'espaces)
                if (mdp.includes(' ')) {
                    errorMessages += 'Le mot de passe ne doit pas contenir d\'espaces.<br>';
                }

                // Affichage des erreurs si nécessaire
                if (errorMessages !== '') {
                    event.preventDefault(); // Empêche la soumission du formulaire
                    document.getElementById('errorMessages').innerHTML = errorMessages;
                }
            });
        });
    </script>
</head>

<body>
    
    <div class="container">
        <!-- Affichage des messages d'erreur -->
        <div id="errorMessages" style="color: red;"></div>

        <!-- Formulaire d'inscription -->
        <form method="POST" action="ajouter_client.php">
            <div class="form-group mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>

            <div class="form-group mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>

            <div class="form-group mb-3">
                <label for="telephone">Téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group mb-3">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary">S’inscrire</button>
        </form>
    </div>
</body>
</html>
