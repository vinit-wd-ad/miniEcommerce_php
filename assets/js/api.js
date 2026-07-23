document.addEventListener('DOMContentLoaded', () => {
    // 1. Add to Cart buttons Actions
    (() => {
        const addToCartButtons = document.querySelectorAll('.add-to-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const btn = event.currentTarget;
                const pid = btn.getAttribute('data-id');

                const productCard = btn.closest('.product-details-content');
                const qtyInput = productCard ? productCard.querySelector('.cart-plus-minus-box') : null;
                const qty = qtyInput ? qtyInput.value : 1;

                if (pid > 0) {
                    fetch(BASE_URL + 'api/cart/add.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            product_id: pid,
                            quantity: qty
                        })
                    })
                        .then(async response => {
                            if (!response.ok) {
                                const errorText = await response.text();
                                throw new Error(`Server returned status ${response.status}: ${errorText}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Success:', data);
                        })
                        .catch(error => {
                            console.error('Fetch Error:', error.message);
                        });
                }
            });
        });
    })();

    // 2. Login / Register Form Actions
    (() => {
        const loginForm = document.querySelector('#login-form');

        if (loginForm) {
            loginForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const email = loginForm.querySelector('[name="user-name"]').value;
                const password = loginForm.querySelector('[name="user-password"]').value;


                fetch(BASE_URL + 'api/auth/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email: email, password: password })
                })
                    .then(async response => {
                        if (!response.ok) {
                            const errorText = await response.text();
                            throw new Error(`Status ${response.status}: ${errorText}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === 'success') {
                            window.location.reload();
                        } else {
                            alert(data.message || 'Login failed!');
                        }
                    })
                    .catch(error => {
                        console.error('Login Error:', error.message);
                    });
            });
        }
    })();

});