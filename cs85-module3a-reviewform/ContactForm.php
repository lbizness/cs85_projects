//GITHUB LINK: https://github.com/lbizness/cs85_projects/tree/main/cs85-module3a-reviewform 

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
        $retval = stripslashes($retval); 
    }
    return($retval); 
}

function validateEmail($data, $fieldName){
    //this function takes the input and does the same as above, but specifically checks if its a valid email format    
    global $errorCount; //Keeps track of the number of errors

    if (empty($data)){ //This checks if the data has content in it or not and handles appropriately.
        echo "\"$fieldName\" is a required field.<br />\n"; //Tells user what went wrong so they are not confused
        ++$errorCount; $retval = " "; //returns an empty value
    }
    else{   //only clean up if the input isn't empty
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL); //uses the filter_var test to check if its a valid email
        
        if (!filter_var($data, FILTER_SANITIZE_EMAIL)){
            echo "\"$fieldName\" is not a valid e-mail address.<br />\n";
        }
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

$ShowForm = TRUE;
$errorCount = 0;
$Sender = "";
$Email = "";
$Subject = "";
$Message = "";

if (isset($_POST['Submit'])){ 
    //checks if the button "submit" was pressed, and validates all the input from the variables using the created functions.
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your E-mail");
    $Subject = validateInput($_POST['Subject'], "Subject");
    $Message = validateInput($_POST['Message'], "Message");
    if ($errorCount==0)
        $ShowForm = FALSE;
    else
        $ShowForm = TRUE;
}

if ($ShowForm == TRUE){
    if ($errorCount>0) //if there were errors
        echo "<p>Please re-enter the form information below.</p>\n";
    displayForm($Sender, $Email, $Subject, $Message); //show the form 
}
else{
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

    $result = mail("recipient@example.com", $Subject, $Message, $Headers);

    if($result)
        echo "<p>Your message has been sent. Thank you, " . $Sender . ".</p>\n";
    else
        echo "<p>There was an error sending your message, " . $Sender . ".</p>\n";
}

/*
REFLECTION:
What does each function do?
    validateInput: takes in the user input and determines if it is filled out or not. If it is filled out, it then cleans up
    and ensures it is ready for use.

    validateEmail: Checks an email and makes sure that it is a correctly formatted email.

    displayForm: constructs the form using HTML and stores the value in the assigned variables.

How is user input protected?
    User input is protected through the validation function, where it is checked if the content is filled out and then trimmed.

What were the most confusing parts?
    The most confusing part for me was the displayForm function, as I had never seen that before in a function. It was a new way for me to 
    display HTML.

What could be improved?
    Instead of checking if "submit" is set, this script should check if ($_SERVER['REQUEST METHOD"] == 'POST'), so that if the user
    submitted by using the 'enter' key this form would still work, instead of checking specifically if the 'submit' button was hit
    on this page.

Why send a copy of the form to the sender?
    This is so the sender can check that what they wanted to send was what they actually sent. This is so they can either be satisfied 
    that what they sent was actually being recieved as they intended, or if they realized they needed to include anything else. It also
    helps the sender verify that the form they filled out actually does something instead of feeling like they are just yelling into the 
    void.

GITHUB LINK: https://github.com/lbizness/cs85_projects/tree/main/cs85-module3a-reviewform
*/
?>
</body>


