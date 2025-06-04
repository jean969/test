<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto Ivoirien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>logo.png">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body>
<header>
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold"><span class="text-orange-600">IVOIRE</span> <span class="text-black-600">FOOD</span></h1>
        <nav class="space-x-6 text-sm font-medium hidden md:flex">
            <a href="<?php echo BASE_URL; ?>ivoire_food.php" class="hover:text-orange-600">Accueil</a>
            <a href="<?php echo BASE_URL; ?>A_propos/about.php" class="hover:text-orange-600">À propos</a>
            <a href="#footer" class="hover:text-orange-600">Contact</a>  
            <a href="<?php echo BASE_URL; ?>panier.html" class="hover:text-orange-600">
                <i class="fa-solid fa-basket-shopping fa-xl" style="color: #f46010;"></i>
            </a>
        </nav>
        <div class="flex items-center space-x-2">
            <?php if ($is_logged_in) : ?>
                <span class="username font-semibold"><?php echo htmlspecialchars($prenom); ?></span>
                <form method="post" class="inline">
                    <button type="submit" name="logout" class="bg-orange-500 text-white px-3 py-2 rounded-full hover:bg-orange-600 text-sm ml-2" title="Déconnexion">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            <?php else : ?>
                <a href="<?php echo BASE_URL; ?>login.php" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 text-sm">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</header> 