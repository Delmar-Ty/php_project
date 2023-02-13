<?php include 'db.php' ?>

<?php 

    parse_str($_SERVER['QUERY_STRING'], $params);
    $username = $params['user'];
    $itemID = $params['id'];
    $ID_SQL = "SELECT id FROM users WHERE username = '{$username}'";
    $getID = mysqli_query($conn, $ID_SQL);
    $user = mysqli_fetch_assoc($getID);
    $userID = (int) $user['id'];
    $getItem = "SELECT * FROM users_menu WHERE id = $itemID";
    $result = mysqli_query($conn, $getItem);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_free_result($getID);
    if (isset($_POST['item']) && isset($_POST['calories'])) {
        $item = $_POST['item'];
        $calories = $_POST['calories'];
        $add = "UPDATE users_menu SET item = '$item', calories = $calories WHERE id = $itemID";
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
    <title>Edit Item</title>

    <link rel="stylesheet" href="assets/create.css">
</head>
<body>
    
    <div id="container">
        <h1 id="title">Edit Item</h1>
        <form action="" id="form" method="post">
            <?php echo '<input type="text" placeholder="Item" id="item" name="item" required class="form-input" value="' . $item['item'] . '">'; ?>
            <?php echo '<input type="number" placeholder="Calories" id="calories" name="calories" required class="form-input" value="' . $item['calories'] . '">'; ?>
            <div id="button-container">
                <button type="submit" id="create-button" class="btn">Edit Item</button>
            </div>
        </form> 
    </div>

</body>
</html>