<!DOCTYPE html>
<html>

<head>
  <title>Task-3</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style>
    .black {
      background-color: black;
      width: 60px;
      height: 60px;
      float: left;
      margin: 0;
    }

    .white {
      background-color: white;
      width: 60px;
      height: 60px;
      float: left;
      margin: 0;
    }

    .clear {
      clear: both;

    }

    .parent {
      margin: auto;
      width: fit-content;
      border: 1px solid black;
    }

    h3 {
      text-align: center;
    }
  </style>
</head>

<body>
  <h3>Chess Board - PHP Nested Loops</h3>
  <!-- cell 270px wide (8 columns x 60px) -->
  <div class="parent">
    <?php
    for ($i = 0; $i <= 7; $i++) {
      for ($j = 0; $j <= 7; $j++) {
        if ((($i + $j) % 2) == 0) {
    ?>
          <div class="black">&nbsp;</div>
        <?php
        } else {
        ?>
          <div class="white">&nbsp;</div>
      <?php
        }
      }
      ?>
      <div class="clear"></div>
    <?php
    }
    ?>
  </div>

  </table>
</body>

</html>
