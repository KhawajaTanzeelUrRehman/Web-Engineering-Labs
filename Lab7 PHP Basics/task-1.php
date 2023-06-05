 </head>

 <body>

   <?php
    $month_temp = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,  
          68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";

    //Converting the string to array.
    $temp_array = explode(',', $month_temp);

    //For Average Tempreture
    function average_temp($array)
    {
      $sum = 0;
      for ($i = 0; $i < sizeof($array); $i++) {
        $sum += $array[$i];
      }
      echo "Average Tempreture is: " . ($sum / (sizeof($array))) . "<hr/>";
    }
    //For 7th lowest temperature.
    function lowest_temp($array)
    {
      sort($array);
      echo "List of seven lowest temperatures: ";
      for ($i = 0; $i <= 6 && $i <= sizeof($array); $i++) {
        echo $array[$i];
        echo " ";
      }
      echo "<hr/>";
    }
    //For 7th highest temperature.
    function highest_temp($array)
    {
      sort($array);
      echo "List of seven hightest temperatures: ";
      for ($i = sizeof($array) - 1; $i > sizeof($array) - 8 && $i >= 0; $i--) {
        echo $array[$i];
        echo " ";
      }
      echo "<hr/>";
    }

    //function Calls
    average_temp($temp_array);
    lowest_temp($temp_array);
    highest_temp($temp_array);
    ?>
 </body>

 </html>