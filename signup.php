<?php include 'db.php'; ?>

<?php 

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkUser = "SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($conn, $checkUser);

    if ($result->num_rows == 0) {
        mysqli_free_result($result);
        $createUser = "INSERT INTO users (username, pass) VALUES ('{$username}','{$password}')";
        mysqli_query($conn, $createUser);
        header('Location: login.html');
    } else {
        mysqli_free_result($result);
        echo 'Error, user already exists!';
        sleep(5);
        header('Location: login.html');
    }
?>