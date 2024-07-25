<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="loginForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>

    <script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault(); 

            $.ajax({
                type: 'POST',
                url: '<?= base_url("login/process") ?>', 
                data: $(this).serialize(), 
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        alert('Login successful');
                    } else {
                        alert('Invalid username or password');
                    }
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
    </script>
</body>
</html>
