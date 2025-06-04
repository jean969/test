let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    function renderCart() {
      cartItemsContainer.innerHTML = "";
      let total = 0;

      cart.forEach((item, index) => {
        const subtotal = item.price * item.quantity;
        total += subtotal;

        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${item.name}</td>
          <td>${item.price} FCFA</td>
          <td>
            <button class="btn-qty" onclick="updateQuantity(${index}, -1)">−</button>
            ${item.quantity}
            <button class="btn-qty" onclick="updateQuantity(${index}, 1)">+</button>
          </td>
          <td>${subtotal} FCFA</td>
          <td><button class="btn-remove" onclick="removeItem(${index})">Supprimer</button></td>
        `;
        cartItemsContainer.appendChild(row);
      });

      cartTotal.textContent = `Total : ${total} FCFA`;
      localStorage.setItem("cart", JSON.stringify(cart));
    }

    function updateQuantity(index, change) {
      cart[index].quantity += change;
      if (cart[index].quantity <= 0) {
        cart.splice(index, 1);
      }
      renderCart();
    }

    function removeItem(index) {
      cart.splice(index, 1);
      renderCart();
    }

    function clearCart() {
      if (confirm("Voulez-vous vraiment vider le panier ?")) {
        cart = [];
        localStorage.removeItem("cart");
        renderCart();
      }
    }

    // Initialisation
    renderCart();
