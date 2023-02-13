<?php include 'db.php' ?>

<?php 

    parse_str($_SERVER['QUERY_STRING'], $params);
    $username = $params['user'];
    $id = $params['id'];
    $rowID = (int) $id;

    $delete = "DELETE FROM users_menu WHERE id = $rowID";
    mysqli_query($conn, $delete);
    header("Location: view.php?user=$username");

?>