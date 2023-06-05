<?php
include './config.php';
if (isset($_POST['deleteButton'])) {
    $deleteId = (int)$_POST['deleteId'];

    $query = "SET FOREIGN_KEY_CHECKS=0; ";
    $query .= "DELETE FROM employees WHERE employeeNumber = $deleteId";

    $exec = mysqli_multi_query($connection, $query);
    if ($exec) {
        echo "Successfully deleted";
    } else {
        echo "Failed to delete";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <br>
    <a href="./lab8.php">Go Back</a>
</body>

</html>