document.addEventListener('DOMContentLoaded', () => {
    loadProducts();

    document.getElementById('search-input').addEventListener('input', function () {
        if (this.value.length > 2) {
            searchProducts();
        } else if (this.value.length === 0) {
            loadProducts();
        }
    });
});

function loadProducts() {
    fetch('products.php')
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector('.products');
            productsContainer.innerHTML = '';
            data.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product');
                productElement.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h2>${product.name}</h2>
                    <p>${product.price} ريال</p>
                    <button class="cart-button" onclick="addToCart(${product.id})">إضافة إلى السلة</button>
                    <button class="review-button" onclick="showReviewForm(${product.id})">إضافة مراجعة</button>
                    <div class="reviews" id="reviews-${product.id}"></div>
                `;
                productsContainer.appendChild(productElement);
                loadReviews(product.id);
            });
        });
}

function searchProducts() {
    const query = document.getElementById('search-input').value;
    fetch('search.php?q=' + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            const productsContainer = document.querySelector('.products');
            productsContainer.innerHTML = '';
            data.forEach(product => {
                const productElement = document.createElement('div');
                productElement.classList.add('product');
                productElement.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h2>${product.name}</h2>
                    <p>${product.price} ريال</p>
                    <button class="cart-button" onclick="addToCart(${product.id})">إضافة إلى السلة</button>
                    <button class="review-button" onclick="showReviewForm(${product.id})">إضافة مراجعة</button>
                    <div class="reviews" id="reviews-${product.id}"></div>
                `;
                productsContainer.appendChild(productElement);
                loadReviews(product.id);
            });
        });
}

function addToCart(productId) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}`
    })
    .then(response => response.text())
    .then(result => alert(result));
}

function showReviewForm(productId) {
    const reviewForm = document.createElement('div');
    reviewForm.classList.add('review-form');
    reviewForm.innerHTML = `
        <h3>أضف مراجعة</h3>
        <form onsubmit="submitReview(event, ${productId})">
            <label for="review-text">مراجعتك:</label>
            <textarea id="review-text" required></textarea>
            <button type="submit">أرسل</button>
        </form>
    `;
    document.getElementById(`reviews-${productId}`).appendChild(reviewForm);
}

function submitReview(event, productId) {
    event.preventDefault();
    const reviewText = document.getElementById('review-text').value;
    
    fetch('review_action.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&review_text=${encodeURIComponent(reviewText)}`
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        loadReviews(productId);
    });
}

function loadReviews(productId) {
    fetch('reviews.php?product_id=' + productId)
        .then(response => response.json())
        .then(data => {
            const reviewsContainer = document.getElementById(`reviews-${productId}`);
            reviewsContainer.innerHTML = '';
            data.forEach(review => {
                const reviewElement = document.createElement('div');
                reviewElement.classList.add('review');
                reviewElement.innerHTML = `
                    <p>${review.review_text}</p>
                    <small>تاريخ: ${new Date(review.created_at).toLocaleDateString()}</small>
                `;
                reviewsContainer.appendChild(reviewElement);
            });
        });
}
