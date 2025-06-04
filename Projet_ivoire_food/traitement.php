<?php
session_start();

$servername = "localhost";
$username = "root"; // À modifier si nécessaire
$password = "";
$database = "ivoire_food";

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["mdp"], $_POST["numero"])) {
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT); // Hash du mot de passe
        $numero = htmlspecialchars($_POST["numero"]);

        // Préparer la requête d'insertion
        $sql = "INSERT INTO user (nom, prenom, email, mdp, numero) VALUES (:nom, :prenom, :email, :mdp, :numero)";
        $stmt = $bdd->prepare($sql);

        // Exécuter la requête
        try {
            $stmt->execute([
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":email" => $email,
                ":mdp" => $mdp,
                ":numero" => $numero
            ]);
            echo "Inscription réussie !";
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs sont requis !";
    }
}

    // Stocker les infos utilisateur en session
    $_SESSION['user_id'] = $bdd->lastInsertId();
    $_SESSION['user_name'] = $prenom . " " . $nom;
    $_SESSION['user_email'] = $email;

    // ✅ Redirection vers la page ivoire_food.php
    header("Location: ivoire_food.php");
    exit();

?>
