let listCart = [];
// Ensure the cart is free from null values
function cleanCart(cart) {
    return cart.filter(item => item !== null);
}
function checkCart() {
    var cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}
checkCart();
addCartToHTML();
function addCartToHTML() {
    // Clear existing data
    let listCartHTML = document.querySelector('.returnCart .list');
    listCartHTML.innerHTML = '';

    let totalQuantityHTML = document.querySelector('.totalQuantity');
    let totalPriceHTML = document.querySelector('.totalPrice');
    let totalQuantity = 0;
    let totalPrice = 0;

    // Clean the cart by removing null values
    listCart = cleanCart(listCart);

    // Check if the cart has items
    if (listCart && listCart.length > 0) {
        listCart.forEach(product => {
            if (product) {
                let newCart = document.createElement('div');
                newCart.classList.add('item');
                newCart.innerHTML =
                    `<img src="${product.image}">
                     <div class="info">
                         <div class="name">${product.name}</div>
                         <div class="price">₹${product.price}/1 product</div>
                     </div>
                     <div class="quantity">${product.quantity}</div>
                     <div class="returnPrice">₹${product.price * product.quantity}</div>`;
                listCartHTML.appendChild(newCart);
                totalQuantity += product.quantity;
                totalPrice += (product.price * product.quantity);
            }
        });
    }

    totalQuantityHTML.innerText = totalQuantity;
    totalPriceHTML.innerText = '₹' + totalPrice;
}

document.querySelector('#checkout-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    let totalQuantity = document.querySelector('.totalQuantity').innerText;
    let totalPrice = document.querySelector('.totalPrice').innerText.replace('₹', '');
    let cart = JSON.parse(document.cookie.split('; ').find(row => row.startsWith('listCart='))?.split('=')[1] || '[]');

    console.log("Total Quantity:", totalQuantity); // Debugging statement
    console.log("Total Price:", totalPrice); // Debugging statement
    console.log("Cart:", cart); // Debugging statement

    // If the cart is empty
    if (cart.length === 0) {
        alert("Cart is empty! Add products before checkout.");
        return;
    }

    let form = document.querySelector('#checkout-form');

    // Hidden fields to send totalQuantity, totalPrice, and cart
    let quantityInput = document.createElement('input');
    quantityInput.type = 'hidden';
    quantityInput.name = 'totalQuantity';
    quantityInput.value = totalQuantity;

    let priceInput = document.createElement('input');
    priceInput.type = 'hidden';
    priceInput.name = 'totalPrice';
    priceInput.value = totalPrice;

    let cartInput = document.createElement('input');
    cartInput.type = 'hidden';
    cartInput.name = 'cart';
    cartInput.value = JSON.stringify(cart);

    form.appendChild(quantityInput);
    form.appendChild(priceInput);
    form.appendChild(cartInput);

    // Submit form after adding the inputs
    form.submit();
});
