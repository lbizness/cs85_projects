<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
</head>
<body>
<?php
function validateInput($data, $fieldName) { 
    //this function takes the input the user gives and ensures it is filled and cleans it up if the input is filled
    global $errorCount; //Keeps track of the number of errors 
    if (empty($data)){ //This checks if the data has content in it or not and handles appropriately.
        echo "\"$fieldName\" is a required field.<br />\n"; //Tells user what went wrong so they are not confused
        ++$errorCount;
        $retval = " "; //returns an empty value
    }
    else{   //only clean up if the input isn't empty
        $retval = trim($data);
        $retval - stripslashes($retval);
    }
    return($retval); 
}

/*
REFLECTION:
What does each function do?
    validateInput: 

How is user input protected?

What were the most confusing parts?

What could be improved?
    
Why send a copy of the form to the sender?

*/
?>
</body>


