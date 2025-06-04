// Gestion de l'ouverture / fermeture du panier
const panierBtn = document.getElementById("panier-btn");
const sidebarPanier = document.getElementById("sidebar-panier");
const overlay = document.getElementById("overlay");
const listePanier = document.getElementById("liste-panier");
const panierCount = document.getElementById("panier-count");

let panier = [];

panierBtn.addEventListener("click", () => {
    sidebarPanier.classList.toggle("translate-x-full");
    overlay.classList.toggle("hidden");
});

overlay.addEventListener("click", () => {
    sidebarPanier.classList.add("translate-x-full");
    overlay.classList.add("hidden");
});

function updatePanierCount() {
    const total = panier.reduce((sum, item) => sum + item.quantite, 0);
    panierCount.textContent = total;
}

function renderPanier() {
    listePanier.innerHTML = "";
    panier.forEach((item, index) => {
        const li = document.createElement("li");
        li.className = "border p-3 rounded shadow-sm";
        li.innerHTML = `
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-bold">${item.nom}</h3>
                    <p class="text-sm text-gray-500">${item.prix} FCFA</p>
                    <p class="text-xs text-gray-400">Ajouté à ${item.heure}</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="text-lg px-2 bg-gray-200 rounded" onclick="changerQuantite(${index}, -1)">-</button>
                    <span>${item.quantite}</span>
                    <button class="text-lg px-2 bg-gray-200 rounded" onclick="changerQuantite(${index}, 1)">+</button>
                </div>
            </div>
        `;
        listePanier.appendChild(li);
    });
    updatePanierCount();
}

function changerQuantite(index, delta) {
    panier[index].quantite += delta;
    if (panier[index].quantite <= 0) panier.splice(index, 1);
    renderPanier();
}

// Gestion du bouton Ajouter
const boutonsAjouter = document.querySelectorAll(".add-panier");
boutonsAjouter.forEach(bouton => {
    bouton.addEventListener("click", () => {
        const nom = bouton.dataset.nom;
        const prix = parseInt(bouton.dataset.prix);
        const heure = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        const existant = panier.find(item => item.nom === nom);
        if (existant) {
            existant.quantite++;
        } else {
            panier.push({ nom, prix, heure, quantite: 1 });
        }

        renderPanier();
    });
});
