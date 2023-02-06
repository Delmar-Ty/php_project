<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="assets/signup.css">
</head>
<body>
    
    <div id="login-container">
        <form action="post" id="form">
            <input type="text" placeholder="Username" maxlength="16" id="username" name="username" required class="form-input">
            <input type="password" placeholder="Password" maxlength="32" id="password" name="password" required class="form-input">
            <input type="email" placeholder="Email" id="email" name="email" required class="form-input">
            <input type="tel" placeholder="Phone (1234567890)" id="phone" name="phone" required class="form-input" pattern="[0-9]{3}[0-9]{3}[0-9]{4}">

            <div id="button-container">
                <button type="submit" id="create-button">Create Account</button>
            </div>
        </form>
    </div>

</body>
</html>