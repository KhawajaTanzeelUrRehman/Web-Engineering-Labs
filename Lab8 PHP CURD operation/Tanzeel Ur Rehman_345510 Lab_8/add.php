<?php
include './config.php';
if(isset($_POST['add'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officeCode = (int)$_POST['officeCode'];
    $reportsTo = $_POST['reportsTo'];
    $jobTitle = $_POST['jobTitle'];
    echo $email;

    $idQuery = "SELECT max(employeeNumber) as latestId FROM employees";
    $execId = mysqli_query($connection, $idQuery);
    $resultId = mysqli_fetch_assoc($execId)['latestId'];
    $resultId = (int)$resultId + 1;

    $query = "INSERT INTO employees (employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle) VALUES ('$resultId', '".$firstName."', '".$lastName."','".$extension."' ,'".$email."' ,'".$officeCode."' ,'".$reportsTo."' , '".$jobTitle."')";
    $exec = mysqli_query($connection, $query);
    if($exec) {
        echo '<br>';
        echo 'added';
        echo '<br>';
    }
    else {
        echo '<br>';
        echo 'not added successfully';
        echo '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
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
    <form action="add.php" method="post">
        <div class="flex">
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname">
        </div>

        <br>
        <div class="flex">
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname">
        </div>

        <br>
        <div class="flex">
            <label for="extension">Extension: </label>
            <input type="text" name="extension" id="extension">
        </div>

        <br>

        <div class="flex">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
        </div>

        <br>

        <div class="flex">
            <label for="officeCode">Office Code: </label>
            <input type="number" name="officeCode" id="officeCode" min=1 max=7>
        </div>

        <br>

        <div class="flex">
            <label for="reportsTo">Reports To: </label>
            <select name="reportsTo" id="reportsTo">
                <?php
                $query = "SELECT firstName, lastName, employeeNumber from employees";
                $exec = mysqli_query($connection, $query);
                while ($result = mysqli_fetch_assoc($exec)) {
                ?>
                    <option value=<?php echo $result['employeeNumber']?>><?php echo $result['firstName'].' '.$result['lastName']?></option>
                <?php
                }
                ?>
            </select>
        </div>
        
        <br>

        <div class="flex">
            <label for="jobTitle">Job Title: </label>
            <input type="text" name="jobTitle" id="jobTitle">
        </div>

        <button type="submit" name='add'>Add</button>
    </form>
</body>

</html>