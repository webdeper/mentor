

<?php
if(isset($_POST['send'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@researchmentor.co.kr";
    $email_subject = "Clinical Enquiry";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['dropdown']) ||
        !isset($_POST['message']) ||
        !isset($_POST['division']) ||
        !isset($_POST['company']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['position'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
    $dropdown = $_POST['dropdown']; // not required
    $division = $_POST['division']; // required
	    $company = $_POST['company']; // required
    $phone = $_POST['phone']; // required
    $position = $_POST['position']; // required

 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 

 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
    $email_message .= "Services: ".clean_string($dropdown)."\n";
    $email_message .= "Division: ".clean_string($division)."\n";
	$email_message .= "Comapny: ".clean_string($company)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Position: ".clean_string($position)."\n";
 
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" ;
@mail($email_to, $email_subject, $email_message, $headers);  


 echo '<script>
		alert("Thank you for contacting us. We will be in touch with you very soon.");
		</script>
	';

 

 
}

?>
