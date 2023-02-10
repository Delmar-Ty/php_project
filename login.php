<?php include 'db.php' ?>

<?php 
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];

        $userAuth = "SELECT * FROM users WHERE username = '{$username}'";
    
        $result = mysqli_query($conn, $userAuth);
        $user = $result -> fetch_assoc();
    
        if (password_verify($_POST['password'], $user['pass'])) {
            header("Location: view.php?user={$username}");
        } else {
            header('Location: login.php');
        }
    
        mysqli_free_result($result);
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login</title>

    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
    
    <div id="login-container">
        <form action="" id="form" method="post">
            <input type="text" placeholder="Username" maxlength="16" name="username" required class="form-input">
            <input type="password" placeholder="Password" maxlength="32" name="password" required class="form-input">

            <div id="button-container">
                <button type="submit" id="login-button">Log In</button>
                <button id="signup-button"><a href="signup.php" id="signup-link">Sign Up</a></button>
            </div>
        </form>
    </div>

</body>
</html>