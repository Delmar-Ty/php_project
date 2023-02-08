<?php include 'db.php' ?>

<?php 
    
    $username = $_POST['username'];

    $userAuth = "SELECT * FROM users WHERE username = '{$username}'";

    $result = mysqli_query($conn, $userAuth);
    $user = $result -> fetch_assoc();

    if (password_verify($_POST['password'], $user['pass'])) {
        echo 'correct login';
    } else {
        echo 'incorrect login';
    }

    mysqli_free_result($result);
   
?>