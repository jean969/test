<footer class="bg-gray-800 text-white py-8">
    <style>
        footer.bg-gray-800 {
            background-color: black !important;
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo -->
            <div class="footer-logo">
                <img src="<?php echo BASE_URL; ?>logo.png" alt="Logo IvoireFood" class="w-32 mb-4">
                <p class="text-sm text-gray-400">Découvrez les saveurs authentiques de la Côte d'Ivoire et de la sous-région.</p>
            </div>

            <!-- Liens -->
            <div class="footer-col">
                <h5 class="text-lg font-semibold text-gray-200 mb-4">Liens</h5>
                <ul class="space-y-2">
                    <li><a href="<?php echo BASE_URL; ?>ivoire_food.php" class="text-gray-400 hover:text-orange-500">Accueil</a></li>
                    <li><a href="<?php echo BASE_URL; ?>A_propos/about.php" class="text-gray-400 hover:text-orange-500">À propos</a></li>
                    <li><a href="<?php echo BASE_URL; ?>menu/menu.html" class="text-gray-400 hover:text-orange-500">Menu</a></li>
                    <li><a href="<?php echo BASE_URL; ?>politique/index.html" class="text-gray-400 hover:text-orange-500">Politique de confidentialité</a></li>
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
            <p class="text-sm text-gray-400">&copy; <?php echo date('Y'); ?> IvoireFood - Tous droits réservés</p>
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

<script src="<?php echo BASE_URL; ?>style/js/ivoire_food.js"></script> 