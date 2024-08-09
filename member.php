<?php
session_start();
include 'config/dbconfig.php';
include 'templates/header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user information
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->execute([':id' => $user_id]);

$user = $stmt->fetch();

// Check if user data is fetched
if (!$user) {
    echo "<p>User not found.</p>";
    include 'templates/footer.php';
    exit();
}
?>

<h2>Member Information</h2>
<div class="user-info">
    <h3>Profile Details</h3>
    <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
    <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <!-- You might want to hide the secure key for security reasons -->
</div>

<a href="logout.php" class="button">Logout</a>

<?php include 'templates/footer.php'; ?>
