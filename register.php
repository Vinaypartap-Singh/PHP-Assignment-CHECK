<?php
include 'templates/header.php';
include 'config/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $securekey = trim($_POST['securekey']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($securekey)) {
        // Hash the securekey
        $hashedSecurekey = password_hash($securekey, PASSWORD_DEFAULT);

        // Prepare and execute the insert statement
        $query = "INSERT INTO users (first_name, last_name, email, securekey) VALUES (:first_name, :last_name, :email, :securekey)";
        $stmt = $db->prepare($query);
        
        // Execute the prepared statement with hashed securekey
        $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':securekey' => $hashedSecurekey
        ]);

        echo "User registered successfully!";
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!-- Registration form -->
<h2>Register</h2>
<form action="register.php" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>
    
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="securekey">Secure Key:</label>
    <input type="password" id="securekey" name="securekey" required><br>
    
    <input type="submit" name="register" value="Register">
</form>


<?php include 'templates/footer.php'; ?>