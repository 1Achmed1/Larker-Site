<?php
include ("connect.php");

$reg = @$_POST['reg'];

$n = "";
$sid = "";
$email = "";
$yogs = "";
$yogl = "";

$n = strip_tags(@$_POST['name']);
$sid = strip_tags(@$_POST['id']);
$email = strip_tags(@$_POST['email']);
$yogs = strip_tags(@$_POST['yog_short']);
$yogl = strip_tags(@$_POST['yog']);

$n_error = "";
$sid_error = "";
$email_error = "";
$yogs_error = "";
$yogl_error = "";
$general_error = "";

if($reg) {
    if($n&&$sid&&$yogs&&$yogl){
        
        if(strlen($n)>2) {
            
            if(strlen($sid)>3||strlen($sid)<7) {
                
                if(strlen($yogs)<3||strlen($yogs)>1) {
                    
                    if(strlen($yogl)<5||strlen($yogl)>3) {
                        if(strlen($email)>6) {
                            $sid_hash = md5($sid);
                        $reg_prep_statement = "INSERT INTO users VALUES ('','$n','$sid_hash','$email','$yogl','$yogs')";
                        $reg_query = mysql_query($reg_prep_statement);
                        die("Registered. Please log in now.");
                        } else {
                            //if the email is wrong or missing
                            $email_error = "Please enter a valid email";
                        }
                    } else {
                        //if the long yog is wrong
                        $yogl_error = "Please enter a 4-digit year of graduation";
                    }
                } else {
                    //if the short yog is wrong
                    $yogs_error = "Please enter a 2-digit year of graduation";
                }
            } else {
                //if student id is wrong
                $sid_error = "Please enter a valid Student ID";
            }
        } else {
            //if name is wrong
            $n_error = "Please enter a valid name";
        }
    } else {
        //if not all fields are filled in
        $general_error = "Please fill in all fields";
    }
}
?>
<html>
    <body>
        <form action="temp-reg.php" method="POST">
            <?php echo $n_error; echo $general_error; ?>
            <input type="text" placeholder="Name: FirstLast" name="name" size="25"><br />
            <?php echo $sid_error; ?>
            <input type="password" placeholder="Student ID" name="id" size="25"><br />
            <?php echo $email_error; ?>
            <input type="email" placeholder="School Email" name="email" size="25"><br />
            <?php echo $yogl_error; ?>
            <input type="number" placeholder="Year of Graduation: I.E. 2019" name="yog" size="25"><br />
            <?php echo $yogs_error; ?>
            <input type="number" placeholder="YOG Short: I.E. 19" name="yog_short" size="25"><br />
            <input type="submit" name="reg" value="Register" />
        </form>
    </body>
</html>