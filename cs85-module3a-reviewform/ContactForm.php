//GITHUB LINK: https://github.com/lbizness/cs85_projects/tree/main/cs85-module3a-reviewform 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
</head>
<body>
<?php
function validateEmail($data, $fieldName) { 
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

function displayForm($Sender, $Email, $Subject, $Message){
    //this function displays the form that the user should fill out.
    ?> <h2 style = "text-align:center">Contact Me</h2>
    <form name = "contact" action ="ContactForm.php" method = "post">
        <p>Your Name:
            <input type="text" name="Sender" value="<?PHP echo $Sender; ?>" /></p>
        <p>Your E-mail:
            <input type="text" name="Email" value="<?php echo $Email; ?>" /></p>
        <p>Subject: 
            <input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>
        <p>Message:<br /> 
            <textarea name = "Message"> <?php echo $Message; ?> </textarea></p>
        <p><input type = "reset" value = "Clear Form" />&nbsp; &nbsp;
            <input type = "submit" name="Submit" value="Send Form" /></p>
</form>
<?php
}



/*
REFLECTION:
What does each function do?
    validateEmail: takes in the user input and determines if it is filled out or not. If it is filled out, it then cleans up
    and ensures it is ready for use.

    displayForm: constructs the form using HTML and stores the value in the assigned variable

How is user input protected?

What were the most confusing parts?

What could be improved?
    
Why send a copy of the form to the sender?

GITHUB LINK: https://github.com/lbizness/cs85_projects/tree/main/cs85-module3a-reviewform
*/
?>
</body>


