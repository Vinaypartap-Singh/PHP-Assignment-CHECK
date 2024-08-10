<?php
include 'templates/header.php';
include 'config/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);

    if (!empty($title) && !empty($content) && !empty($author)) {
        // Prepare and execute the insert statement
        $query = "INSERT INTO blogs (title, content, author) VALUES (:title, :content, :author)";
        $stmt = $db->prepare($query);
        
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':author' => $author
        ]);

        echo "Blog post submitted successfully!";
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<h2>Upload Blog</h2>
<form action="upload_blog.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>
    
    <label for="content">Content:</label>
    <textarea id="content" name="content" rows="5" required></textarea><br>
    
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php include 'templates/footer.php'; ?>
