<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Product List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Category ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->categoryID); ?></td>
                    <td><?php echo e($product->productName); ?></td>
                    <td>$<?php echo e(number_format($product->productPrice, 2)); ?></td>
                    <td><?php echo e($product->description); ?></td>
                    <td>
                        <img src="<?php echo e(asset('storage/' . $product->productImage)); ?>" alt="<?php echo e($product->productName); ?>" class="img-thumbnail" style="width: 100px; height: auto;">
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/BAD Final Project/BAD_FINALPROJECT/resources/views/product.blade.php ENDPATH**/ ?>