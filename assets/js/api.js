document.addEventListener('DOMContentLoaded', () => {

    /**
     * Display a temporary floating alert notification
     * 
     * @param {string} message - Text message to show
     * @param {string} type - Alert type: 'success', 'error', 'warning', 'info' (Default: 'success')
     * @param {number} duration - Display duration in milliseconds (Default: 2000ms)
    */
    function showAlert(message, type = 'success', duration = 2000) {
        // 1. Check if container exists; if not, create and append it to the body
        let container = document.querySelector('#custom-alert-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'custom-alert-container';
            document.body.appendChild(container);
        }

        // 2. Create the alert element
        const alertBox = document.createElement('div');
        alertBox.className = `custom-alert ${type}`;
        alertBox.innerText = message;

        // 3. Append alert element to container
        container.appendChild(alertBox);

        // 4. Trigger slide-in animation
        setTimeout(() => {
            alertBox.classList.add('show');
        }, 50);

        // 5. Automatically hide and remove the alert element after specified duration
        setTimeout(() => {
            alertBox.classList.remove('show');
            setTimeout(() => {
                alertBox.remove();
            }, 300); // Wait for transition animation to complete
        }, duration);
    }

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
                            // console.log('Success:', data);
                            showAlert(data.message, 'success');
                        })
                        .catch(error => {
                            // console.error('Fetch Error:', error.message);
                            showAlert(error.message, 'error');
                        });
                }
            });
        });
    })();

    // 2. Login Form Actions
    (() => {
        const loginForm = document.querySelector('#login-form');
        const msgBox = document.querySelector('#msg-box');

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
                            window.location.href = BASE_URL + 'my-account.php';
                        } else {
                            showAlert(data.message || 'Login failed', 'warning')
                        }
                    })
                    .catch(error => {
                        showAlert('Login failed', 'error')
                    });
            });
        }
    })();

    // 3. Register Form Actions
    (() => {
        const registerForm = document.querySelector('#register-form');
        const msgBox = document.querySelector('#msg-box');

        if (registerForm) {
            registerForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const name = registerForm.querySelector('[name="user-name"]')?.value.trim();
                const email = registerForm.querySelector('[name="user-email"]')?.value.trim();
                const password = registerForm.querySelector('[name="user-password"]')?.value;

                if (!name || !email || !password) {
                    alert('All fields are required!');
                    return;
                }

                fetch(BASE_URL + 'api/auth/register.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name: name, email: email, password: password })
                })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) {
                            throw new Error(data.message || `HTTP Error ${response.status}`);
                        }
                        return data;
                    })
                    .then(data => {
                        if (data.status === 'success') {
                            window.location.href = BASE_URL + 'my-account.php';
                        } else {
                            // msgBox.textContent = data.message
                            showAlert('Registration failed!','warning');
                        }
                    })
                    .catch(error => {
                        // msgBox.textContent = error.message;
                        showAlert('An error occurred during registration.', 'error');
                    });
            });
        }
    })();

});