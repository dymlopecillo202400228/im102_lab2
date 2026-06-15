<?php
require_once 'config.php';

$sql = "
SELECT
    p.id,
    p.name,
    p.description,
    p.price,
    p.stock,
    c.name AS category,
    s.name AS supplier,
    p.created_at
FROM products p
JOIN categories c ON p.category_id = c.id
JOIN suppliers s ON p.supplier_id = s.id
ORDER BY p.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Products</h1>

<table border="1">
    <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
        <th>Supplier</th>
        <th>Created At</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo number_format($row['price'], 2); ?></td>
        <td><?php echo $row['stock']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['supplier']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php endwhile ?>

</table>

</body>
</html>