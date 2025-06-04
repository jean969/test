<?php
// Tableau des sections de menu
$menu_sections = [
    'Entrées' => [
        ['name' => 'Alloco', 'description' => 'Bananes plantains frites', 'price' => 1000, 'image' => 'alloco.jpeg'],
        ['name' => "Sauté d'escargot", 'description' => 'escargot + bananes plantains', 'price' => 1000, 'image' => 'escargot.jpeg'],
        // ... autres entrées
    ],
    'Cuisine de la Basse Côte' => [
        ['name' => 'Dorade braisée', 'description' => "Accompagner d'Attiéké", 'price' => 2000, 'image' => 'dorade.jpeg'],
        // ... autres plats
    ],
    // ... autres sections
];

// Fonction pour afficher un plat
function displayDish($dish) {
    $base_url = BASE_URL;
    echo <<<HTML
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <img src="{$base_url}ivoire_food/{$dish['image']}" alt="{$dish['name']}" class="w-full h-60 object-cover">
        <div class="p-4">
            <h4 class="text-xl font-semibold text-gray-800">{$dish['name']}</h4>
            <p class="text-sm text-gray-600 mb-2">{$dish['description']}</p>
            <div class="flex justify-between items-center">
                <span class="text-orange-600 font-bold">{$dish['price']} FCFA</span>
                <button class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm" 
                        data-name="{$dish['name']}" 
                        data-price="{$dish['price']}">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
HTML;
}

// Afficher toutes les sections
foreach ($menu_sections as $section_name => $dishes) {
    echo <<<HTML
    <section id="menu" class="py-16 px-6 max-w-7xl mx-auto">
        <div id="{$section_name}"></div>
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-black-600 border-b-2 border-black-200 inline-block pb-1">{$section_name}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
HTML;
    
    foreach ($dishes as $dish) {
        displayDish($dish);
    }
    
    echo '</div></section>';
}
?> 