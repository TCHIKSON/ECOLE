document.getElementById('form').addEventListener('submit', function(e) {
    const mdp = document.getElementById('mdp').value;
    
    if (mdp.includes(' ')) {
        alert('Le mot de passe ne doit pas contenir d\'espaces.');
        e.preventDefault();
    }
});
