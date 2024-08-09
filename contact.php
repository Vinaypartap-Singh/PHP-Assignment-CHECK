<?php
include 'templates/header.php';
include 'config/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $userName = trim($_POST['user_name']);
    $userEmail = trim($_POST['user_email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (!empty($userName) && !empty($userEmail) && !empty($subject) && !empty($message)) {
        // Prepare and execute the insert statement
        $query = "INSERT INTO contact (user_name, user_email, subject, message) VALUES (:user_name, :user_email, :subject, :message)";
        $stmt = $db->prepare($query);
        
        // Execute the prepared statement
        $stmt->execute([
            ':user_name' => $userName,
            ':user_email' => $userEmail,
            ':subject' => $subject,
            ':message' => $message
        ]);

        echo "Message sent successfully!";
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!-- Contact form -->
<h2>Contact Us</h2>
<form action="contact.php" method="post">
    <label for="user_name">Name:</label>
    <input type="text" id="user_name" name="user_name" required><br>
    
    <label for="user_email">Email:</label>
    <input type="email" id="user_email" name="user_email" required><br>
    
    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required><br>
    
    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="5" required></textarea><br>
    
    <input type="submit" name="submit" value="Send Message">
</form>

<?php include 'templates/footer.php'; ?>
