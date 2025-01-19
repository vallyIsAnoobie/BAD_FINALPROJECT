// Step 1: Log in and get the token
fetch('/login', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
        email: 'user@example.com',
        password: 'password123'
    })
})
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            // Store the token in localStorage
            localStorage.setItem('jwt_token', data.token); // Save the received token

            // Step 2: Use the token in subsequent requests
            const savedToken = localStorage.getItem('jwt_token');
            fetch('/api/protected-route', {
                method: 'GET',  // Using GET method for protected route
                headers: {
                    'Authorization': `Bearer ${savedToken}`  // Add token in Authorization header
                }
            })
                .then(response => response.json())
                .then(protectedData => {
                    console.log(protectedData); // Handle the response from the protected route
                })
                .catch(error => console.error('Error fetching protected route:', error));
        } else {
            console.error('No token received from login');
        }
    })
    .catch(error => console.error('Login failed:', error));

    fetch('/api/protected-route', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${savedToken}`
        }
    })
        .then(response => response.json())
        .then(protectedData => {
            console.log(protectedData); // Handle the response from the protected route
        })
        .catch(error => console.error('Error fetching protected route:', error));
    