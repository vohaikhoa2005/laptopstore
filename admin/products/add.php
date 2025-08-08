<?php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

// Fetch categories for select
$cat_stmt = $conn->query('SELECT id, name FROM categories ORDER BY name ASC');
$categories = $cat_stmt->fetchAll(PDO::FETCH_ASSOC);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $descriptions = trim($_POST['descriptions'] ?? '');
    $stock = intval($_POST['stock'] ?? 0);
    $category_id = intval($_POST['category_id'] ?? 0);
    $thumbnail_path = '';
    // Handle thumbnail upload
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $thumb_tmp = $_FILES['thumbnail']['tmp_name'];
        $thumb_name = uniqid('thumb_') . '_' . basename($_FILES['thumbnail']['name']);
        $thumb_dest = dirname(__DIR__,2) . '/uploads/products/' . $thumb_name;
        if (move_uploaded_file($thumb_tmp, $thumb_dest)) {
            $thumbnail_path = 'uploads/products/' . $thumb_name;
        } else {
            $error = 'Thumbnail upload failed.';
        }
    }
    if ($name === '' || $price === '' || $category_id === 0) {
        $error = 'Name, price, and category are required.';
    } else {
        $stmt = $conn->prepare('INSERT INTO products (name, price, descriptions, stock, category_id, thumbnail) VALUES (:name, :price, :descriptions, :stock, :category_id, :thumbnail)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':descriptions', $descriptions);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':thumbnail', $thumbnail_path);
        if ($stmt->execute()) {
            $product_id = $conn->lastInsertId();
            // Handle multiple product images upload
            if (!empty($_FILES['images']['name'][0])) {
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                        $img_name = uniqid('img_') . '_' . basename($_FILES['images']['name'][$key]);
                        $img_dest = dirname(__DIR__,2) . '/uploads/products/' . $img_name;
                        if (move_uploaded_file($tmp_name, $img_dest)) {
                            $img_url = 'uploads/products/' . $img_name;
                            $img_stmt = $conn->prepare('INSERT INTO product_images (image_url, product_id) VALUES (:image_url, :product_id)');
                            $img_stmt->bindParam(':image_url', $img_url);
                            $img_stmt->bindParam(':product_id', $product_id);
                            $img_stmt->execute();
                        } else {
                            $error = 'Image upload failed.';
                        }
                    }
                }
            }
            header('Location: index.php');
            exit;
        } else {
            $error = 'Failed to add product.';
        }
    }
}
?>
<?php include dirname(__DIR__) . '/../admin/admin_header.php'; ?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Add Product</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="descriptions">Descriptions</label>
                    <textarea class="form-control" id="descriptions" name="descriptions"></textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="0">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail Image</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="images">Other Product Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                    <small class="form-text text-muted">You can select multiple images.</small>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include dirname(__DIR__) . '/../admin/admin_footer.php'; ?>
