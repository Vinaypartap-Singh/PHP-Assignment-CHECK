<?php
include 'templates/header.php';
include 'config/dbconfig.php';

// Prepare and execute the select statement
$query = "SELECT * FROM blogs ORDER BY created_at DESC";
$stmt = $db->query($query);

$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Blog Posts</h2>
<?php if (!empty($blogs)): ?>
    <?php foreach ($blogs as $blog): ?>
        <div class="blog-post">
            <h3><?php echo htmlspecialchars($blog['title']); ?></h3>
            <p><em>By <?php echo htmlspecialchars($blog['author']); ?> on <?php echo htmlspecialchars($blog['created_at']); ?></em></p>
            <div>
                <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No blog posts available.</p>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
