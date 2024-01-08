<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь</title>
</head>
<body>
    <form method="POST">
    <?php

    $months = ['jan' => 31, 'feb' => 29, 'mar' => 31, 
    'apr' => 30, 'may' => 31, 'jun' => '30', 
    'jul' => 31, 'aug' => 31, 'sep' => 30,
    'oct' => 31, 'nov' => 30, 'dec' => 31];

    $week = ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];

    foreach ($months as $m => $date)
    { ?>

        <input type="submit" name="month-button" value="<?php echo $m; ?>">

        <?php
    }

    ?>
    </form>

    <?php

    if(isset($_POST["month-button"]))
    {
        $mon = $_POST["month-button"];
        echo $mon . "<br>";
        
        $count_days = 0;
        foreach ($months as $m => $date)
        {
            if ($m != $mon){
                $count_days += $date;
            }
            else{
                $count_days -= floor($count_days / 7) * 7;
                break;
            }
        }

        for ($i = 0; $i <= 6; $i++)
        {
            echo " " . $week[$i];
        }
        echo "<br>";

        $j = 0;
        for ($i = 1; $i <= $months[$mon]; $i++)
        {   
            if ($i == 1) {
                while ($j < $count_days){
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
                    $j += 1;
                } 
            }
            if ($j == 6 || $j == 5) {echo "<span style=" . "color:red" . ">&nbsp$i</span>";}
            else {echo " $i";}
            $j += 1;
            if ($j == 7) { echo "<br>"; $j =0; } 

        }
    }



    ?>
</body>
</html>