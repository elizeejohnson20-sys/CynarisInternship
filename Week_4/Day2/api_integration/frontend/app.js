const API_URL = 'http://127.0.0.1:8000/api';

let token = '';

async function login() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch(`${API_URL}/login`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    });

    const data = await response.json();

    if (response.ok) {
        token = data.token;

        document.getElementById('login-message').textContent =
            'Login successful!';

        document.getElementById('product-section')
            .classList.remove('hidden');

        loadProducts();
    } else {
        document.getElementById('login-message').textContent =
            data.message || 'Login failed.';
    }
}

async function loadProducts() {
    const response = await fetch(`${API_URL}/products`, {
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    });

    const data = await response.json();

    const productsContainer = document.getElementById('products');

    productsContainer.innerHTML = '';

    if (data.data.length === 0) {
        productsContainer.innerHTML = '<p>No products available.</p>';
        return;
    }

    data.data.forEach(product => {
        const productElement = document.createElement('div');

        productElement.className = 'product';

        productElement.innerHTML = `
            <h3>${product.name}</h3>
            <p>${product.description || ''}</p>
            <p>Price: ₹${product.price}</p>
            <p>Stock: ${product.stock}</p>

            <button onclick="editProduct(
                ${product.id},
                '${product.name.replace(/'/g, "\\'")}',
                '${(product.description || '').replace(/'/g, "\\'")}',
                ${product.price},
                ${product.stock}
            )">
                Edit
            </button>

            <button onclick="deleteProduct(${product.id})">
                Delete
            </button>
        `;

        productsContainer.appendChild(productElement);
    });
}

async function addProduct() {
    const name = document.getElementById('name').value;
    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;
    const stock = document.getElementById('stock').value;

    const response = await fetch(`${API_URL}/products`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify({
            name: name,
            description: description,
            price: Number(price),
            stock: Number(stock)
        })
    });

    const data = await response.json();

    if (response.ok) {
        document.getElementById('product-message').textContent =
            'Product added successfully.';

        document.getElementById('name').value = '';
        document.getElementById('description').value = '';
        document.getElementById('price').value = '';
        document.getElementById('stock').value = '';

        loadProducts();
    } else {
        document.getElementById('product-message').textContent =
            data.message || 'Failed to add product.';
    }
}

async function editProduct(
    id,
    currentName,
    currentDescription,
    currentPrice,
    currentStock
) {
    const name = prompt('Product name:', currentName);

    if (name === null) {
        return;
    }

    const description = prompt('Description:', currentDescription);

    if (description === null) {
        return;
    }

    const price = prompt('Price:', currentPrice);

    if (price === null) {
        return;
    }

    const stock = prompt('Stock:', currentStock);

    if (stock === null) {
        return;
    }

    const response = await fetch(`${API_URL}/products/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify({
            name: name,
            description: description,
            price: Number(price),
            stock: Number(stock)
        })
    });

    const data = await response.json();

    if (response.ok) {
        document.getElementById('product-message').textContent =
            'Product updated successfully.';

        loadProducts();
    } else {
        document.getElementById('product-message').textContent =
            data.message || 'Failed to update product.';
    }
}

async function deleteProduct(id) {
    const response = await fetch(`${API_URL}/products/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    });

    const data = await response.json();

    if (response.ok) {
        loadProducts();
    } else {
        alert(data.message || 'Failed to delete product.');
    }
}