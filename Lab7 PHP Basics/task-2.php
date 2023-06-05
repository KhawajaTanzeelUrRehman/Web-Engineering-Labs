<!DOCTYPE html>
<html>

<head>
    <title>Task-2</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<style>
    td {
        height: 50px;
    }
</style>

<body>
    <table width=50% border=2px align="center">
        <?php
        //Outer loop for printing rows 
        for ($i = 1; $i <= 6; $i++) {
        ?>
            <tr align="center">
                <?php
                //Innner loop for printing columns 
                for ($j = 1; $j <= 5; $j++) {
                ?>
                    <td><?php echo "" . $i . " * " . $j . " = " . $j * $i . ""; ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>
