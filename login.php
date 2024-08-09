<?php
include 'templates/header.php';
include 'config/dbconfig.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $securekey = trim($_POST['securekey']);

    if (!empty($email) && !empty($securekey)) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch();

        if ($user) {
            // Print both securekey and hashed securekey for debugging
            echo '<p>User found. Secure key verification...</p>';
            echo '<p><strong>Provided Secure Key:</strong> ' . htmlspecialchars($securekey) . '</p>';
            echo '<p><strong>Stored Hashed Secure Key:</strong> ' . htmlspecialchars($user['securekey']) . '</p>';

            if (password_verify($securekey, $user['securekey'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                header("Location: member.php");
                exit();
            } else {
                $error = "Invalid email or secure key.";
            }
        } else {
            $error = "User not found.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<h2>Login</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="securekey">Secure Key:</label>
    <input type="password" id="securekey" name="securekey" required><br>
    
    <input type="submit" name="login" value="Login">
</form>

<?php include 'templates/footer.php'; ?>
