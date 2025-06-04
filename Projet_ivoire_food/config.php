<?php
// Configuration de la session
$session_config = [
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']),
    'use_strict_mode' => true,
    'cookie_samesite' => 'Strict'
];

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ivoire_food');

// URLs de base
define('BASE_URL', 'http://localhost/projet_IVOIRE_FOOD/');

// Paramètres de sécurité
define('HASH_COST', 12); // Pour le hachage des mots de passe 