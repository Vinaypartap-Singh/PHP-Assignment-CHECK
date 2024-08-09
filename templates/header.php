<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="banner">
        <h1>PHP Final Assignment</h1>
        <h3>Users' Info Using PHP with MySQL</h3>
    </header>
    <div id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="member.php">Member</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="main-content">
