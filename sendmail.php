<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $to = "abgirlchigume@gmail.com"; // 🔁 CHANGE to your real email
    $email_subject = "New message from your website: $subject";
    $email_body = "You have received a new message:\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Phone: $phone\n".
                  "Subject: $subject\n".
                  "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<h3>✅ Message sent successfully!</h3>";
    } else {
        echo "<h3>❌ Failed to send message. Please try again.</h3>";
    }
} else {
    echo "<h3>Invalid request.</h3>";
}
?>
