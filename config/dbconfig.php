<?php
try {
    $dsn = 'mysql:host=localhost;dbname=assignment_db';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
