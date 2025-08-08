<?php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

$id = $_GET['id'] ?? '';
$error = '';
$name = '';
if ($id) {
    $stmt = $conn->prepare('SELECT * FROM categories WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cat = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($cat) {
        $name = $cat['name'];
    } else {
        $error = 'Category not found.';
    }
} else {
    $error = 'Invalid category ID.';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    $name = trim($_POST['name'] ?? '');
    if ($name === '') {
        $error = 'Category name is required.';
    } else {
        $stmt = $conn->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Failed to update category.';
        }
    }
}
?>
<?php include dirname(__DIR__) . '/../admin/admin_header.php'; ?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include dirname(__DIR__) . '/../admin/admin_footer.php'; ?>
