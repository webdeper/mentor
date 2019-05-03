<?php
if(isset($_POST["send"])){
// Checking For Blank Fields..
if($_POST["name"]==""||$_POST["email"]==""||$_POST["dropdown"]==""||$_POST["message"]==""||$_POST["division"]==""||$_POST["position"]==""||$_POST["company"]==""||$_POST["phone"]==""){
echo " 	<script>alert('Fill All Fields.');</script>";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['email'];

// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = $_POST['dropdown'];
$message = $_POST['message'];
$headers = 'From:'. $email . "rn"; // Sender's Email
$username = $_POST['name'];
$company = $_POST['company'];
$division = $_POST['division'];
$position = $_POST['position'];
$phone = $_POST['phone'];

	
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = "CLINICAL ENQUIRY \n
         Here are the details:\n Name: $username \n \n
        Email: $email \n Message \n $message \n
        Phone: $phone \n Division: $division \n Company: $company \n Position: $position";
// Send Mail By PHP Mail Function
mail("info@webdeper.ml", $subject, $message, $headers );

echo '<script>
		alert("Your mail has been sent successfuly ! Thank you for your feedback");
		</script>
	';
}
}
}
?>


