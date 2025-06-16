<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($email) || empty($message) || empty($service)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Email details
    $to = "virajpate27@gmail.com"; // Replace with your email address
    $subject = "Contact Form ";
    $body = "You have received a new message from your contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Phone: $phone\n" .
            "Service: $service\n" .
            "Message:\n$message";
    $headers = "From: virajpate27@gmail.com";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to Thank You page
        header("Location: thank-you.html");
       
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
