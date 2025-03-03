<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the email (basic validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Recipient email address (where the message will be sent)
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "Contact Us Form Submission from $name";
    $body = "You have received a new message from the Contact Us form.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message:\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Thank you for your message! We will get back to you shortly.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
