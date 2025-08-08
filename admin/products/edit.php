<?php
require_once dirname(__DIR__, 2) . '/config/app.php';
require_once dirname(__DIR__, 2) . '/config/database.php'; // $conn is PDO

$id = $_GET['id'] ?? '';
$error = '';
if ($id) {
    $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        $error = 'Product not found.';
    }
    // Fetch product images
    $img_stmt = $conn->prepare('SELECT * FROM product_images WHERE product_id = :product_id');
    $img_stmt->bindParam(':product_id', $id, PDO::PARAM_INT);
    $img_stmt->execute();
    $product_images = $img_stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Xử lý xóa ảnh cũ (luôn thực hiện riêng, không ảnh hưởng tới update)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_image_id']) && $id) {
    $delete_id = intval($_POST['delete_image_id']);
    // Lấy đường dẫn ảnh
    $img_stmt = $conn->prepare('SELECT image_url FROM product_images WHERE id = :id AND product_id = :product_id');
    $img_stmt->execute([':id' => $delete_id, ':product_id' => $id]);
    $img = $img_stmt->fetch(PDO::FETCH_ASSOC);
    if ($img) {
        $img_path = dirname(__DIR__, 2) . '/' . $img['image_url'];
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        $conn->prepare('DELETE FROM product_images WHERE id = :id')->execute([':id' => $delete_id]);
    }
    // Reload lại trang để cập nhật danh sách ảnh
    header('Location: edit.php?id=' . $id);
    exit;
} else {
    $error = 'Invalid product ID.';
}
// Fetch categories for select
$cat_stmt = $conn->query('SELECT id, name FROM categories ORDER BY name ASC');
$categories = $cat_stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    // Nếu submit là xóa ảnh thì không update sản phẩm
    if (!isset($_POST['delete_image_id'])) {
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');
        $descriptions = trim($_POST['descriptions'] ?? '');
        $stock = intval($_POST['stock'] ?? 0);
        $category_id = intval($_POST['category_id'] ?? 0);
        $thumbnail_path = $product['thumbnail'];
        // Handle thumbnail upload
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $thumb_tmp = $_FILES['thumbnail']['tmp_name'];
            $thumb_name = uniqid('thumb_') . '_' . basename($_FILES['thumbnail']['name']);
            $thumb_dest = '../../uploads/products/' . $thumb_name;
            if (move_uploaded_file($thumb_tmp, $thumb_dest)) {
                $thumbnail_path = 'uploads/products/' . $thumb_name;
            }
        }
        if ($name === '' || $price === '' || $category_id === 0) {
            $error = 'Name, price, and category are required.';
        } else {
            $stmt = $conn->prepare('UPDATE products SET name = :name, price = :price, descriptions = :descriptions, stock = :stock, category_id = :category_id, thumbnail = :thumbnail WHERE id = :id');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':descriptions', $descriptions);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':thumbnail', $thumbnail_path);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                // Nếu có upload ảnh mới thì xóa toàn bộ ảnh cũ và ghi lại ảnh mới
                if (!empty($_FILES['images']['name'][0])) {
                    $conn->prepare('DELETE FROM product_images WHERE product_id = :product_id')->execute([':product_id' => $id]);
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                        if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                            $img_name = uniqid('img_') . '_' . basename($_FILES['images']['name'][$key]);
                            $img_dest = '../../uploads/products/' . $img_name;
                            if (move_uploaded_file($tmp_name, $img_dest)) {
                                $img_url = 'uploads/products/' . $img_name;
                                $img_stmt = $conn->prepare('INSERT INTO product_images (image_url, product_id) VALUES (:image_url, :product_id)');
                                $img_stmt->bindParam(':image_url', $img_url);
                                $img_stmt->bindParam(':product_id', $id);
                                $img_stmt->execute();
                            }
                        }
                    }
                }
                header('Location: index.php');
                exit;
            } else {
                $error = 'Failed to update product.';
            }
        }
    }
}
?>
<?php include dirname(__DIR__) . '/../admin/admin_header.php'; ?>
<div class="container-fluid mt-4">
    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if ($product): ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptions">Descriptions</label>
                        <textarea class="form-control" id="descriptions" name="descriptions"><?= htmlspecialchars($product['descriptions']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="<?= htmlspecialchars($product['stock']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail Image</label>
                        <?php if (!empty($product['thumbnail'])): ?>
                            <div class="mb-2"><img src="../../<?= htmlspecialchars($product['thumbnail']) ?>" alt="Thumbnail" style="max-width:120px;"></div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                        <small class="form-text text-muted">Leave blank to keep current thumbnail.</small>
                    </div>
                    <div class="form-group">
                        <label for="images">Other Product Images</label>
                        <?php if ($product_images): ?>
                            <div class="mb-2">
                                <?php foreach ($product_images as $img): ?>
                                    <form method="post" style="display:inline-block;margin-right:8px;">
                                        <img src="../../<?= htmlspecialchars($img['image_url']) ?>" alt="Product Image" style="max-width:80px;vertical-align:middle;">
                                        <input type="hidden" name="delete_image_id" value="<?= $img['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?');">Delete</button>
                                    </form>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                        <small class="form-text text-muted">Chọn nhiều ảnh mới để thay thế toàn bộ ảnh cũ.</small>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include dirname(__DIR__) . '/../admin/admin_footer.php'; ?>