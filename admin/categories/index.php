<?php
// categories/index.php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

// Fetch categories
$stmt = $conn->query('SELECT * FROM categories ORDER BY id DESC');
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include dirname(__DIR__) . '/../admin/admin_header.php'; ?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Manage Categories</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <span class="m-0 font-weight-bold text-primary">Category List</span>
            <a href="add.php" class="btn btn-success btn-sm">Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?= htmlspecialchars($cat['id']) ?></td>
                            <td><?= htmlspecialchars($cat['name']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?= $cat['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include dirname(__DIR__) . '/../admin/admin_footer.php'; ?>
