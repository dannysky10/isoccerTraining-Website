<?php
$errors = '';
$myemail = 'obraimah@mail.uoguelph.ca';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['mail']) ||
   empty($_POST['subject'])  ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
 
$name = $_POST['name']; 
$email_address = $_POST['mail']; 
$subject = $_POST['subject']; 
$message = $_POST['message']; 
 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}
//compose and send email
if( empty($errors))
 
{
 
$to = $myemail;
 
$email_subject = "Contact form submission: $name";
 
$email_body = "You have received a new message. ".
 
" Here are the details:\n Name: $name \n".
 
"Subject: $subject \n Email: $email_address\n Message: \n $message";
 
$mail = mail($to,$email_subject,$email_body,"");
if(isset($mail)){
  header('Location: return.html');
}
else if(isset($_POST['mail']) && !empty($_POST['mail'])){
     echo "Mail is set";
}
else{
  echo "Mail sending failed."; 
}
}
?>