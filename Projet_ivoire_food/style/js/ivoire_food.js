document.addEventListener("DOMContentLoaded", function () {
    // Animation de chargement
    const heroText = document.querySelector("#hero h1");
    heroText.style.opacity = 0;
    heroText.style.transform = "translateY(-20px)";
    setTimeout(() => {
        heroText.style.transition = "all 1s ease-in-out";
        heroText.style.opacity = 1;
        heroText.style.transform = "translateY(0)";
    }, 500);

    // Effets de survol sur les plats
    const menuItems = document.querySelectorAll(".menu-section div");
    menuItems.forEach(item => {
        item.addEventListener("mouseover", () => {
            item.style.transform = "scale(1.05)";
            item.style.transition = "all 0.3s ease-in-out";
        });
        item.addEventListener("mouseout", () => {
            item.style.transform = "scale(1)";
        });
    });

});
document.addEventListener("DOMContentLoaded", function () {
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    // Affiche le bouton lorsque l'utilisateur scrolle vers le bas
    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            scrollTopBtn.style.display = "flex";
        } else {
            scrollTopBtn.style.display = "none";
        }
    });

    // Remonte en haut de la page lorsqu'on clique sur le bouton
    scrollTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
            
        });
    });
});
// Ajouter au panier 
 document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
      const name = button.getAttribute('data-name');
      const price = parseInt(button.getAttribute('data-price'));

      const item = { name, price, quantity: 1 };

      let cart = JSON.parse(localStorage.getItem('cart')) || [];

      const existingItem = cart.find(i => i.name === name);
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push(item);
      }

      localStorage.setItem('cart', JSON.stringify(cart));
      alert(`"${name}" a été ajouté au panier !`);
      window.location.href = ""; // redirige vers le panier
    });
  });
