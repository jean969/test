
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | IvoireFood</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./style/css/register.css">
    <script src="https://kit.fontawesome.com/48d43c639e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("signup-form").addEventListener("submit", function (event) {
        let firstname = document.getElementById("firstname").value.trim();
        let lastname = document.getElementById("lastname").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();
        let numero = document.getElementById("numero").value.trim();

        if (firstname === "" || lastname === "" || email === "" || password === "" || numero === "") {
            alert("Veuillez remplir tous les champs !");
            event.preventDefault();
            return;
        }

        if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
            alert("Veuillez entrer une adresse e-mail valide !");
            event.preventDefault();
            return;
        }

        if (password.length < 6) {
            alert("Le mot de passe doit contenir au moins 6 caractères !");
            event.preventDefault();
            return;
        }

        if (!numero.match(/^\d{10}$/)) {
            alert("Veuillez entrer un numéro de téléphone valide (10 chiffres) !");
            event.preventDefault();
            return;
        }
    });
});
</script>

<body>

    <div class="register-container">
        <!-- Partie gauche avec le logo -->
        <div class="register-left">
            <h1> IVOIRE<font color="black">FOOD</font></h1>
            <p>Inscrivez-vous</p>
        </div>

        <!-- Formulaire de connexion -->
        <div class="register-right">
        <div class="register-form">
            <form id="signup-form" action="traitement.php" method="post">   
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                <input type="email" name="email" id="email" placeholder="Adresse e-mail" required>
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required>
                <input type="text" name="numero" id="numero" placeholder="Numéro de téléphone" required>
                <hr>
                <button type="submit" name="ok">S'inscrire</button>
                <div class="login-link">
                    <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
