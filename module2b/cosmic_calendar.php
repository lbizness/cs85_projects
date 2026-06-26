<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cosmic Calendar</title>
    <!-- All styling for the final output page is included below -->
    <style>
        body { font-family: sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 2rem; background-color: #2d3748; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        h1 { text-align: center; color: #9f7aea; }
        .calendar-grid { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .day-box { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 5px; background-color: #4a5568; font-size: 1.2rem; }
        .cosmic-name { background-color: #9f7aea; color: #fff; transform: scale(1.1); box-shadow: 0 0 15px #9f7aea; }
        .cosmic-month { border: 2px solid #f6e05e; }
        .cosmic-both { background-color: #ed8936; color: #fff; border: 2px solid #f6e05e; transform: scale(1.1); box-shadow: 0 0 15px #ed8936; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cosmic Calendar</h1>
        <div class="calendar-grid">
            <?php
                $firstName = 'Luke';
                
                //fetch json and convert json into php object
                $jsonString = file_get_contents('https://timeapi.io/api/time/current/zone?timeZone=America%2FLos_Angeles');
                $data = json_decode($jsonString);

                $nameLength = strlen($firstName);

                //extract datetime + day of year
                $dateTimeString = $data->dateTime;
                $date = new DateTime($dateTimeString);
                $dayOfYear = (int)$date->format('z') + 1;
                $month = $data->month;

                for ($x = $nameLength; $x <= $dayOfYear; $x++){
                    $cssClass = "day-box";
                    $addClassSwitch = false;
                    $addedClass = ' ';

                    //find if divisible by using modulus operator, if its zero it is divisible
                    if ($x % $nameLength == 0 && $x % $month == 0) {
                        $addClassSwitch = true;
                        $addedClass = "cosmic-both";
                    }
                    else if ($x % $nameLength == 0){
                        $addClassSwitch = true;
                        $addedClass ="cosmic-name";
                    }
                    else if ($x % $month == 0){
                        $addClassSwitch = true;    
                        $addedClass = "cosmic-month";
                    }

                    if ($addClassSwitch == true)
                        echo "<div class='$cssClass $addedClass'>$x</div>";
                    else
                        echo "<div class='$cssClass'>$x</div>";
                }

                /*
                MY DEBUGGING LOG:
                Problem: I was struggling with adding in the CSS with my conditional statements. The page did not appear correct.
                Solution: By reviewing some CSS material and working through the logic, I figured out a way to display the 
                classes in a way that made sense. I added a boolean to switch between if there was an added class or not and then made
                another if statement.

                */
            ?>
        </div>
    </div>
</body>
</html>