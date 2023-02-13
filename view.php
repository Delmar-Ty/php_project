<?php include 'db.php' ?>

<?php 

    parse_str($_SERVER['QUERY_STRING'], $params);
    $username = $params['user'];
    $ID_SQL = "SELECT id FROM users WHERE username = '{$username}'";
    $getID = mysqli_query($conn, $ID_SQL);
    $user = mysqli_fetch_assoc($getID);
    $userID = (int) $user['id'];
    mysqli_free_result($getID);

    $getMenu = "SELECT * FROM users_menu WHERE user_id = {$userID}";
    $result = mysqli_query($conn, $getMenu);
    if ($result->num_rows == 0) {
        $insertDefault = "INSERT INTO users_menu (user_id, item, calories) VALUES ({$userID}, 'Cheeseburger', 520)";
        mysqli_query($conn, $insertDefault);
        mysqli_free_result($result);
        header("Location: view.php?user=$username");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Menu</title>

    <link rel="stylesheet" href="assets/view.css">
</head>
<body>
    <h1 id="title"><?php echo $username . "'s Food Menu" ?></h1>
    <div id="data-container">
        <div id="overflow">
            <!-- <div class="row">
                <div class="col">Sample</div>
                <div class="col">Sample</div>
                <div class="col">
                    <button class="btn" id="edit">Edit</button>
                </div>
                <div class="col">
                    <button class="btn" id="delete">Delete</button>
                </div>
            </div> -->

            <?php 
            
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <div class="row">
                            <div class="col">' . $row['item'] . '</div>
                            <div class="col">' . $row['calories'] . '</div>
                            <div class="col">
                                <button class="btn"><a href="edit.php?user=' . $username . '&id=' . $row['id'] . '" style="text-decoration: none; color: var(--smoky-black);">Edit</a></button>
                            </div>
                            <div class="col">
                                <button class="btn" id="delete"><a href="delete.php?user=' . $username . '&id=' . $row['id'] . '" style="text-decoration: none; color: var(--smoky-black)">Delete</a></button>
                            </div>
                        </div>
                    ';
                }
            }
            
            ?>
        </div>
        <div id="button-container">
            <?php echo '<button id="add" class="btn"><a href="create.php?user=' . $username . '">Add Item</a></button>'; ?>
            <button id="log-out" class="btn"><a href="login.php">Log Out</a></button>
        </div>
    </div>
</body>
</html>