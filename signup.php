<?php include 'db.php'; ?>

<?php 

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sql = "SELECT username FROM users WHERE username = $username";
// echo mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'Username already exists';
    mysqli_free_result($result);
    sleep(5);
    header('Location: login.html');
} else {
    mysqli_free_result($result);
    $createUser = "INSERT INTO users (username, password, email, phone) VALUES ('$username', '$password', '$email', $phone)";
    if (mysqli_query($conn, $createUser)) {
        echo 'Account Created';
        header('Location: login.html');
    } else {
        echo 'Error';
        header('Location: login.html');
    }
}

?>