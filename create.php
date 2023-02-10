<?php include 'db.php' ?>

<?php 

    parse_str($_SERVER['QUERY_STRING'], $params);
    $username = $params['user'];
    $ID_SQL = "SELECT id FROM users WHERE username = '{$username}'";
    $getID = mysqli_query($conn, $ID_SQL);
    $user = mysqli_fetch_assoc($getID);
    $userID = (int) $user['id'];
    mysqli_free_result($getID);
    if (isset($_POST['item']) && isset($_POST['calories'])) {
        $item = $_POST['item'];
        $calories = $_POST['calories'];
        $add = "INSERT INTO users_menu (user_id, item, calories) VALUES ($userID, '{$item}', $calories)";
        mysqli_query($conn, $add);
        header("Location: view.php?user=$username");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <link rel="stylesheet" href="assets/create.css">
</head>
<body>
    
    <div id="container">
        <h1 id="title">Add Item</h1>
        <form action="" id="form" method="post">
            <input type="text" placeholder="Item" id="item" name="item" required class="form-input">
            <input type="number" placeholder="Calories" id="calories" name="calories" required class="form-input">
            <div id="button-container">
                <button type="submit" id="create-button" class="btn">Create Account</button>
            </div>
        </form> 
    </div>

</body>
</html>