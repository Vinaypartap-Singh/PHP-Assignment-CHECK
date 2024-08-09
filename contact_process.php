<?php
include 'config/dbconfig.php'; // Include your database connection

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
    $stmt = $db->prepare($query);
    $result = $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message
    ]);

    if ($result) {
        echo "<p>Thank you for your message. We will get back to you soon.</p>";
    } else {
        echo "<p>There was an error processing your request. Please try again later.</p>";
    }
}
?>
