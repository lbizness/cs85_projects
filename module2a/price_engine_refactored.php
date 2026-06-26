<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T-Shirt Price Engine</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f6f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .receipt { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #005a9c; }
        h1 { text-align: center; color: #005a9c; }
        ul { list-style: none; padding: 0; }
        li { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .total { font-size: 1.5em; color: #28a745; }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Order Summary</h1>
        <?php
            // --- Configuration: Change these values to test all business rules! ---
            $size = 'XL'; // Options: 'S', 'M', 'L', 'XL'
            $color = 'Sunset Orange'; // Any string, but test with 'Sunset Orange' or 'Ocean Blue'
            $isCustomized = true; // Options: true, false
            $customerFirstName = 'Luke'; // <-- IMPORTANT: REPLACE WITH YOUR ACTUAL FIRST NAME

            // --- Part A: Implement the logic below using ONLY simple, nested if-statements ---
            $finalPrice = 22.50;
            $details = "<li>Base Price: <span>$" . number_format($finalPrice, 2) . "</span></li>";

            // Your nested if-statement logic goes here...
            // Example of a rule:
            // if ($size == 'L') {
            //     $finalPrice = $finalPrice + 1.75;
            //     $details .= "<li>Size (L) Upcharge: <span>+$1.75</span></li>";
            // }
            
            if ($size == 'L'){
                $finalPrice = $finalPrice + 1.75;
                $details .= "<li>Size (L) Upcharge: <span>+$1.75</span></li>";
            }
            else if ($size == 'XL'){
                $finalPrice = $finalPrice + 2.50;
                $details .= "<li>Size (XL) Upcharge: <span>+$2.50</span></li>";
            }

            //color upcharge calc
            if ($color == 'Sunset Orange' || $color == 'Ocean Blue'){
                $finalPrice = $finalPrice + 2.00;
                if ($color == 'Sunset Orange')
                    $details .= "<li>Color (Sunset Orange) Upcharge: <span>+$2.00</span></li>";
                else
                    $details .= "<li>Color (Ocean Blue) Upcharge: <span>+$2.00</span></li>";
            }

            if ($isCustomized == true){
                $finalPrice = $finalPrice + 5.00;
                $details .= "<li>Customization Upcharge: <span>+$5.00</span></li>";
            }
            if ($isCustomized == true && $size == 'XL'){
                $finalPrice = $finalPrice + 3.00;
                $details .= "<li>Size (XL) Handling Fee: <span>+$3.00</span></li>";
                
            }
            
            /*
            MY DEBUGGING LOG: 
            Problem: 
            In Part B, I was challenged to rethink through the problem and come up with more efficient
            ways to rewrite the problem.

            Solution:
            I found that by aiming to reduce redundency in my code I was able to figure out where I could 
            improve. I added in a compoud operator for the color, and made an elseif for the size. I did
            find that adding a nested if/else statement into the color made sense to me. 

            */

            // --- DO NOT EDIT BELOW THIS LINE ---
            echo "<ul>" . $details . "</ul>";
            echo "<ul><li><span class='total'>Final Price:</span> <span class='total'>$" . number_format($finalPrice, 2) . "</span></li></ul>";

        ?>
    </div>
</body>
</html>