<?php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

$name = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = 'uploads/categories/' . uniqid() . '.' . $ext;
        if (!is_dir('uploads/categories')) mkdir('uploads/categories', 0777, true);
        move_uploaded_file($_FILES['image']['tmp_name'], $filename);
        $image_path = $filename;
    }
    if ($name === '') {
        $error = 'Category name is required.';
    } else {
        $stmt = $conn->prepare('INSERT INTO categories (name, image) VALUES (:name, :image)');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Failed to add category.';
        }
    }
}
?>
<?php include dirname(__DIR__) . '/../admin/admin_header.php'; ?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Add Category</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Category Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success mt-2">Add</button>
                <a href="index.php" class="btn btn-secondary mt-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include dirname(__DIR__) . '/../admin/admin_footer.php'; ?>
