<?php
include './config.php';

if (isset($_POST['editButton'])) {
    $id = $_POST['editId'];
    $query = "SELECT * FROM employees WHERE employeeNumber=$id";
    $exec = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($exec);
}
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $extension = $_POST['extension'];
    $officeCode = $_POST['officeCode'];
    $email = $_POST['email'];
    $reportsTo = $_POST['reportsTo'];
    $jobTitle = $_POST['jobTitle'];
    $employeeNumber = $_POST['id1'];
    $queryUpdate = "UPDATE employees SET firstName= '$fname', lastName='$lname', email= '$email', reportsTo= '$reportsTo', jobTitle= '$jobTitle', extension='$extension', officeCode='$officeCode' WHERE employeeNumber=$employeeNumber";

    $execUpdate = mysqli_query($connection, $queryUpdate);
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update an Employee</title>
    <style>
        .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        form {
            width: 300px;
            display: flex;
            flex-direction: column;
            row-gap: 2px;
        }
    </style>
</head>

<body>
    <form action="update.php" method="post">
        <div class="flex">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" value="<?php echo $result['firstName'] ?>">
        </div>

        <br>
        <div class="flex">
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname" value="<?php echo $result['lastName'] ?>">
        </div>

        <br>
        <div class="flex">
            <label for="extension">Extension: </label>
            <input type="text" name="extension" id="extension" value="<?php echo $result['extension'] ?>">
        </div>

        <br>

        <div class="flex">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="<?php echo $result['email'] ?>">
        </div>

        <br>

        <div class="flex">
            <label for="officeCode">Office Code: </label>
            <input type="number" name="officeCode" id="officeCode" min=1 max=7 value="<?php echo $result['officeCode'] ?>">
        </div>

        <br>

        <div class="flex">
            <label for="reportsTo">Reports To: </label>
            <select name="reportsTo" id="reportsTo">
                <?php
                $query1 = "SELECT firstName, lastName, employeeNumber from employees";
                $exec1 = mysqli_query($connection, $query1);
                while ($result1 = mysqli_fetch_assoc($exec1)) {
                ?>
                    <option <?php if ($result['reportsTo'] == $result1['employeeNumber']) {
                                echo 'selected';
                            } else {
                            } ?> value=<?php echo $result1['employeeNumber'] ?>><?php echo $result1['firstName'] . ' ' . $result1['lastName'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <br>

        <div class="flex">
            <label for="jobTitle">Job Title: </label>
            <input type="text" name="jobTitle" id="jobTitle" value="<?php echo $result['jobTitle'] ?>">
        </div>

        <input hidden type="number" name="id1" id="id1" value="<?php echo $result['employeeNumber'] ?>">
        <button type="submit" name='update'>Update</button>
    </form>
</body>

</html>