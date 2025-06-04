<?php
session_start();
$servername = "localhost";
$username = "root"; // Remplace par ton utilisateur MySQL si nécessaire
$password = "";
$database = "ivoire_food";

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Vérification si l'email existe
    $requete = $bdd->prepare("SELECT * FROM user WHERE email = :email");
    $requete->execute(["email" => $email]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['prenom'] . " " . $user['nom'];
        $_SESSION['user_email'] = $user['email'];

        header("Location:ivoire_food.php"); // ✅ Redirection après connexion réussie
        exit();
    } else {
        $error_message = "❌ Email ou mot de passe incorrect !";
    }
}
?>   

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Connexion | IvoireFood</title>
</head>
<style>
    /* Style général */
body {
    font-family: 'Poppins', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container principal */
.login-container {
    display: flex;
    width: 900px;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

/* Partie gauche */
.login-left {
    background: #d35400;
    color: white;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 50px;
    text-align: center;
}

.login-left h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

/* Partie droite */
.login-right {
    flex: 1;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
}

input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    width: 108%;
    padding: 12px;
    background: #e67e22;
    border: none;
    color: white;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;

}

button:hover {
    background: #d35400;
}

.forgot-password {
    text-align: center;
    margin: 10px 0;
    font-size: 14px;
    color: #1877f2;
    text-decoration: none;
    background-color: #fff;
}

hr {
    margin: 15px 0;
    border: none;
    height: 1px;
    background: #ccc;
}

/* Bouton créer un compte */
.register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

/* Responsive */
@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
        width: 90%;
    }
}
</style>
<script>
    document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Veuillez remplir tous les champs !");
        return;
    }

    if (!email.includes("@")) {
        alert("Veuillez entrer une adresse e-mail valide !");
        return;
    }

    alert("Connexion réussie !");
});

</script>
<body>

<div class="login-container">
    <!-- Partie gauche avec le logo -->
    <div class="login-left">
        <h1>IVOIRE<font color="black">FOOD</font></h1>
        <p>Connectez-vous et commandez vos plats préférés.</p>
    </div>

    <!-- Formulaire de connexion -->
    <div class="login-right">
        <?php if (isset($error_message)) : ?>
            <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form  method="POST">
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit"><i class="fas fa-sign-in-alt"></i> Se connecter</button>
            <a href="#" class="forgot-password">Mot de passe oublié ?</a>
            <hr>
            <div class="register-link">
                <p>Pas encore inscrit ? <a href="http://localhost/projet_IVOIRE_FOOD/register.php">Créer un compte</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
