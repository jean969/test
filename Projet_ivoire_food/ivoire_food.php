<?php
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']),
    'use_strict_mode' => true,
    'cookie_samesite' => 'Strict'
]);

// Vérifier si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']);
$prenom = $is_logged_in ? $_SESSION['user_name'] : "";
// Déconnexion sans redirection vers une autre page
if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    session_start(); // Démarrer une nouvelle session propre
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); 
}

?>
<?php
// Vérifie si l'utilisateur est connecté
$is_logged_in = isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0;
?>

<script>
// Désactive les boutons "Ajouter" si l'utilisateur n'est pas connecté
document.addEventListener('DOMContentLoaded', function() {
    var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
    if (!isLoggedIn) {
        document.querySelectorAll('.add-to-cart').forEach(function(btn) {
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            btn.title = "Connectez-vous pour ajouter au panier";
        });
    }
});
</script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Ivoire_Food</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="logo.png">
</head>
<style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .scrollbar-hide::-webkit-scrollbar {
  display: none;
}
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

  </style>
<body>
<header>
<div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold"><span class="text-orange-600">IVOIRE</span> <span class="text-black-600">FOOD</span></h1>
      <nav class="space-x-6 text-sm font-medium hidden md:flex">
  <a href="http://localhost/projet_IVOIRE_FOOD/ivoire_food.php" class="hover:text-orange-600">Accueil</a>
  <a href="http://localhost/projet_IVOIRE_FOOD/A_propos/about.php" class="hover:text-orange-600">À propos</a>
  <a href="#footer" class="hover:text-orange-600">Contact</a>  
<a href="panier.html" class="hover:text-orange-600"><i class="fa-solid fa-basket-shopping fa-xl" style="color: #f46010;"></i></a>

</nav>

    <div class="flex items-center space-x-2">
        <?php if ($is_logged_in) : ?>
            <span class="username font-semibold"><?php echo $prenom; ?></span>
            <form method="post" class="inline">
                <button type="submit" name="logout" class="bg-orange-500 text-white px-3 py-2 rounded-full hover:bg-orange-600 text-sm ml-2" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        <?php else : ?>
            <a href="login.php" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 text-sm">Connexion</a>
        <?php endif; ?>
    </div>
      
    </div>
</header>
<section id="hero">
    <!-- HERO SECTION -->
    <div class="bg-[url('https://source.unsplash.com/1600x600/?african-food')] bg-cover bg-center text-white">
        <div class="bg-black/60 py-28 px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Dégustez les meilleures spécialités ivoiriennes</h2>
            <p class="mb-6 text-lg">Passez votre commande en ligne Faites voyager vos papilles ! <br>Livraison rapide, produits frais, saveurs authentiques</p>
            <a href="http://localhost/projet_IVOIRE_FOOD/menu/menu.html" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full font-medium">Découvrir le menu</a>
        </div>
    </div>
    <div class="bg-white px-4 py-3 rounded-xl shadow-md overflow-x-auto scrollbar-hide"> 
        <ul class="flex flex-nowrap space-x-4 sm:space-x-6 text-gray-700 font-medium text-sm sm:text-base">
            <li><a href="#Entrées" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Entrées</a></li>
            <li><a href="#Cuisine de la Basse Côte" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Cuisine de la Basse Côte</a></li>
            <li><a href="#Cuisine du Centre et de l'Est Akan" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Centre & Est Akan</a></li>
            <li><a href="#Cuisine de l'Ouest" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Cuisine de l'Ouest</a></li>
            <li><a href="#Cuisine du Nord" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Cuisine du Nord</a></li>
            <li><a href="#Cuisine d'Afrique de l'Ouest" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Afrique de l'Ouest</a></li>
            <li><a href="#Desserts et Boissons" class="block whitespace-nowrap px-4 py-2 rounded-lg hover:bg-orange-100 hover:text-orange-600 transition duration-200 ease-in-out">Desserts & Boissons</a></li>
        </ul>
    </div>
</section>

</section><br><br>
<h3 class="text-3xl font-bold text-center text-orange-600 mb-10">Nos Spécialités Régionales</h3>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Entrées"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Entrées</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/alloco.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Alloco</h4><p class="text-sm text-gray-600 mb-2">Bananes plantains frites</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Alloco" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/escargot.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauté d'escargot</h4><p class="text-sm text-gray-600 mb-2">escargot + bananes plantains</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauté d'escargot" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/frites_d'igname.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Frites d'igname </h4><p class="text-sm text-gray-600 mb-2">Igname frites</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Frites d'igname" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/puredepoisson.png" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Purée de Poisson</h4><p class="text-sm text-gray-600 mb-2">Purée de Poisson fumé</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Purée de Poisson" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/avocat.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Purée d'avocat au thon</h4><p class="text-sm text-gray-600 mb-2">La tropicalise</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Purée d'avocat au thon" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/salade_exotique.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Salade exotique</h4><p class="text-sm text-gray-600 mb-2">Salade sucré-salé</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Salade exotique" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/salade_gourmande.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Salade gourmande</h4><p class="text-sm text-gray-600 mb-2">Salade</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Salade gourmande" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/carpacio.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Carpaccio d'Assinie</h4><p class="text-sm text-gray-600 mb-2">Filet de mérou</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Carpaccio d'Assinie" data-price="1000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/poisson.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Boulettes de poisson</h4><p class="text-sm text-gray-600 mb-2">Poisson frit</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">1 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Boulettes de poisson" data-price="1000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Cuisine de la Basse Côte"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Cuisine de la Basse Côte</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/dorade.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Dorade braisée</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Dorade braisée" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/marmite.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Marmite de pêcheur</h4><p class="text-sm text-gray-600 mb-2">Accompagner de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Marmite de pêcheur" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/katoum.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Poulet katoum</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Poulet katoum" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/ntroh.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce N'troh</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké à l'huile rouge ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce N'troh" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/kedjenou.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Kédjénou de poulet</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Kédjénou de poulet" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/aubergine.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce aubergine</h4><p class="text-sm text-gray-600 mb-2">Accompagner de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce aubergine" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/sauceclaire.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce claire </h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane ou Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce claire" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/saumon.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Brouchette de filet de saumon marinés</h4><p class="text-sm text-gray-600 mb-2">Saumon braisé</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Brouchette de filet de saumon marinés" data-price="2000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Cuisine du Centre et de l'Est Akan"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Cuisine du Centre et de l'Est Akan</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/gnagnan.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce gnagnan</h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce gnagnan" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/djumble.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce djumblé</h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane ou de  Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce djumblé" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/ragoût.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Ragoût d'igname</h4><p class="text-sm text-gray-600 mb-2">Bananes plantains frites</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Ragoût d'igname" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/akpessi.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Akpéssi</h4><p class="text-sm text-gray-600 mb-2">Accompagner de Banane ou Igname</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Akpéssi" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/biekosseu.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Bieko-seu</h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane, de Riz ou d'Attiéké</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Bieko-seu" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/pistache.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce pistache</h4><p class="text-sm text-gray-600 mb-2">Accompagner Foutou banane ou igname ou alors de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce pistacheoco" data-price="2000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Cuisine de l'Ouest"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Cuisine de l'Ouest</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/graine.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce graine</h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce graine" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/riz.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Riz gras aux poulets</h4><p class="text-sm text-gray-600 mb-2">Riz gras aux poulets</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Riz gras aux poulets" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/viande.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Viande de brousse braisée</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Viande de brousse braisée" data-price="2000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Cuisine du Nord"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Cuisine du Nord</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/sakasaka.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce feuille de patate (Saka-saka)</h4><p class="text-sm text-gray-600 mb-2">Accompagner de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce feuille de patate" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/arachide.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce arachide au poulet </h4><p class="text-sm text-gray-600 mb-2">Accompagner de foutou banane ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce arachide au poulet" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/tomate.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Sauce tomate</h4><p class="text-sm text-gray-600 mb-2">Accompagner d'Attiéké ou de Riz</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Sauce tomate" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/toh.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Tôh de maïs avec la sauce gombo</h4><p class="text-sm text-gray-600 mb-2">Pâte de farine de maïs à la sauce gombo</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Tôh de maïs avec la sauce gombo" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/courgette.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Graines de courgettes au poulet</h4><p class="text-sm text-gray-600 mb-2">Accompagner  de foutou igname</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Graines de courgettes au poulet" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/couscous.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Couscous</h4><p class="text-sm text-gray-600 mb-2">Couscous</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Couscous" data-price="2000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Cuisine d'Afrique de l'Ouest"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Cuisine d'Afrique de l'Ouest</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/garba.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Garba (Côte d'ivoire)</h4><p class="text-sm text-gray-600 mb-2">Garba </p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Garba" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/tchep.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Tchep bou djen (Sénégal)</h4><p class="text-sm text-gray-600 mb-2">Tchep bou djen</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Tchep bou djen" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/yassa.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Yassa au poulet (Mali)</h4><p class="text-sm text-gray-600 mb-2">Yassa au poulet</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Yassa au poulet" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/ablo.png" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Ablo (Bénin)</h4><p class="text-sm text-gray-600 mb-2">Ablo</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Ablo" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/suya.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Suya (Nigeria)</h4><p class="text-sm text-gray-600 mb-2">Suya</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Suya" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/babenda.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Babenda (Burkina Faso)</h4><p class="text-sm text-gray-600 mb-2">Babenda</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Babenda" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/waakye.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Waakye (Ghana)</h4><p class="text-sm text-gray-600 mb-2">Waakye</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Waakye" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/akoume.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Akoumé (Togo)</h4><p class="text-sm text-gray-600 mb-2">Akoumé</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Akoumé" data-price="2000"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/djekoume.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Djenkoumé (Togo)</h4><p class="text-sm text-gray-600 mb-2">Djenkoumé</p><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">2 000 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Djenkoumé" data-price="2000"> Ajouter </button></div></div></div>
    </div>
</section>
<section id="menu" class="py-16 px-6 max-w-7xl mx-auto ">
    <div id="Desserts et Boissons"></div>
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">Desserts et Boissons</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/beignetsananas.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Beignets à l'ananas</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Beignets à l'ananas" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/croquette.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Croquette</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Croquette" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/coco.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Croissant lunaire au coco</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Croissant lunaire au coco" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/degue.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Dêguê</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Dêguê" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/bissap.jpeg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Jus de bissap</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Jus de bissap" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/gingembre.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Jus de gingembre</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Jus de gingembre" data-price="500"> Ajouter </button></div></div></div>
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden"><img src="ivoire_food/tarmarin.jpg" alt="Alloco" class="w-full h-60 object-cover"><div class="p-4"><h4 class="text-xl font-semibold text-gray-800">Jus de tamarin</h4><div class="flex justify-between items-center"><span class="text-orange-600 font-bold">500 FCFA</span><button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" data-name="Jus de tamarin" data-price="500"> Ajouter </button></div></div></div>
    </div>
</section>
<div id="sidebar-panier" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg p-4 transform translate-x-full transition-transform duration-300 z-50 overflow-y-auto">
    <h2 class="text-xl font-bold mb-4">Votre Panier</h2>
    <ul id="liste-panier" class="space-y-4"></ul>
</div>
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-30 hidden z-40"></div>

<script src="panier.js"></script>
<footer class="bg-gray-800 text-white py-8">
    <div id="footer"></div>
    <style>
        footer.bg-gray-800 {
            background-color: black !important;
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Logo -->
            <div class="footer-logo">
                <img src="logo.png" alt="Logo IvoireFood" class="w-32 mb-4">
                <p class="text-sm text-gray-400">Découvrez les saveurs authentiques de la Côte d'Ivoire et de la sous-région.</p>
            </div>
            <!-- Liens -->
            <div class="footer-col">
                <h5 class="text-lg font-semibold text-gray-200 mb-4">Liens</h5>
                <ul class="space-y-2">
                    <li><a href="http://localhost/projet_IVOIRE_FOOD/ivoire_food.php" class="text-gray-400 hover:text-orange-500">Accueil</a></li>
                    <li><a href="http://localhost/projet_IVOIRE_FOOD/A_propos/about.php" class="text-gray-400 hover:text-orange-500">À propos</a></li>
                    <li><a href="/projet_IVOIRE_FOOD/menu/menu.html" class="text-gray-400 hover:text-orange-500">Menu</a></li>
                    <li><a href="http://localhost/projet_IVOIRE_FOOD/politique/index.html" class="text-gray-400 hover:text-orange-500">Politique de confidentialité</a></li>
                </ul>
            </div>

            <!-- Contacts -->
            <div class="footer-col">
                <h5 class="text-lg font-semibold text-gray-200 mb-4">Contacts</h5>
                <ul class="space-y-2">
                    <li><a href="mailto:ivoirefood@email.com" class="text-gray-400 hover:text-orange-500">
                        <i class="fa-solid fa-envelope"></i> mail: ivoirefood@email.com
                    </a></li>
                    <li><a href="tel:+2250708000000" class="text-gray-400 hover:text-orange-500">
                        <i class="fa-solid fa-phone"></i> Phones: +225 07.08.00.00.00 / +225 07.07.99.00.01
                    </a></li>
                </ul>
            </div>

            <!-- Réseaux sociaux -->
            <div class="footer-social">
                <h5 class="text-lg font-semibold text-gray-200 mb-4">Suivez-nous</h5>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-green-500"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" class="text-gray-400 hover:text-pink-500"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-black"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom mt-8 border-t border-black-600 pt-4 text-center">
            <p class="text-sm text-gray-400">&copy; 2024 IvoireFood - Tous droits réservés</p>
        </div>
    </div>
</footer>

<button 
  id="scrollTopBtn" 
  title="Retour en haut"
  class="fixed bottom-6 right-6 z-50 w-12 h-12 flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white text-xl rounded-full shadow-lg transition-transform duration-300 ease-in-out hover:scale-110"
>
  <i class="fa-solid fa-arrow-up"></i>
</button>
    <script src="./style/js/ivoire_food.js"></script>
</body>
</html>