function getCartItemTemplate(id, product) {
    return `
        <div class="card w-100 mb-2">
            <button type="button"
                class="btn-close shadow-none position-absolute top-0 end-0 m-1" title="Remove product"
                onclick="removeProduct(${id})"
            ></button>
            <img src="storage/${product['image_location']}" class="card-img-top cart-product-img" alt="Product image">
            <div class="card-body d-flex justify-content-between">
                <div class="fs-4 text-truncate" title="Product 1">${product['quantity']} x ${product['name']}</div>
                <div class="fs-4">${product['price'] * product['quantity']}$</div>
            </div>
        </div>
    `;
}

function reloadCart() {
    const cartProductsContainer = document.querySelector('.cart-products-container');

    if(localStorage.getItem("cart")) {
        let cart = JSON.parse(localStorage.getItem("cart"));

        let products = '';
        Object.keys(cart).forEach(function(key) {
            products += getCartItemTemplate(key, cart[key])
        })
        cartProductsContainer.innerHTML = products;
    }
}

function buttonSuccessStyle(productId) {
    const product = document.querySelector('#product-'+productId+' button');
    product.classList.add("btn-success");
    setTimeout(() => {
        product.classList.remove("btn-success");
    }, 200);
}

document.addEventListener("DOMContentLoaded", function() {
    reloadCart();
});

window.addProduct = function (productId, product)
{
    const cart = JSON.parse(localStorage.getItem("cart")) ?? {};

    if(cart[product.id] === undefined) {
        cart[product.id] = {
            'quantity': 1,
            'image_location': product['product_info'] ? product['product_info']['image_location'] : '',
            'name': product.name,
            'price': product.price
        };
    } else {
        cart[product.id]['quantity'] = ++cart[product.id]['quantity'];
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    reloadCart();
}

window.removeProduct = function (productId){
    const basket = JSON.parse(localStorage.getItem("cart")) ?? {};
    delete basket[productId];
    localStorage.setItem("cart", JSON.stringify(basket));
    reloadCart();
}

window.placeOrder = function (){
    let orderNumber = document.getElementById('orderModalPhone').value;
    let orderAddress = document.getElementById('orderModalAddress').value;

    const cart = JSON.parse(localStorage.getItem("cart")) ?? {};

    let order = new XMLHttpRequest();
    let productMinified = {};
    let products = [];


    for(let product in cart){
        productMinified.id = product;
        productMinified.quantity = cart[product]['quantity'];
        products.push({...productMinified});
    }

    order.open('POST', '/api/products/order', true);
    order.send(JSON.stringify({
        'phone_number': orderNumber,
        'address': orderAddress,
        'products': products
    }));

    localStorage.removeItem("cart");
    window.location.reload();
}
