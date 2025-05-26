<?php
// Replace with your receiving email address
$receiving_email_address = 'rodrigobraz.dev@gmail.com';

// Make sure the request is a POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get the form fields and remove whitespace
  $name    = trim($_POST["name"]);
  $email   = trim($_POST["email"]);
  $subject = trim($_POST["subject"]);
  $message = trim($_POST["message"]);

  // Basic validation (you can improve this)
  if (!empty($name) && !empty($email) && !empty($subject) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
    // Set the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($receiving_email_address, $subject, $email_content, $email_headers)) {
      echo "Message sent successfully!";
    } else {
      echo "Sorry, something went wrong. Please try again.";
    }

  } else {
    echo "Please complete the form and provide a valid email.";
  }

} else {
  echo "Invalid request method.";
}
?>