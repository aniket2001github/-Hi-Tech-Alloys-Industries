<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sales@hitechalloyind.com";
    $from = isset($_POST['email']) ? $_POST['email'] : '';
    $sender_name = isset($_POST['name']) ? $_POST['name'] : 'No Name';
    $address = isset($_POST['address']) ? $_POST['address'] : 'No Address';
    $service = isset($_POST['service']) ? $_POST['service'] : 'Not Specified';
    $note = isset($_POST['note']) ? $_POST['note'] : '';

    $subject = "New Contact Form Submission from $sender_name";
    $message = "$sender_name has sent a contact message.\n\n".
               "Service Interested: $service\n".
               "Address: $address\n\n".
               "Message:\n$note";

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Redirect to your main website after success
        header("Location: https://www.hitechalloyind.com");
        exit();
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>
