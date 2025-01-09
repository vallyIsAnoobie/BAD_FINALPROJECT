<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Order Summary</h2>

    <!-- Check if order exists -->
    <?php if($order): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Total Items</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Display order information -->
                <tr>
                    <td><?php echo e($order->orderID); ?></td>  <!-- Order ID -->
                    <td><?php echo e($order->productName); ?></td>  <!-- This assumes `product_name` is an attribute of the `Order` model -->
                    <td><?php echo e($order->productID); ?></td>  <!-- Product ID -->
                    <td><?php echo e($totalItems); ?></td>  <!-- Total Items -->
                    <td>$<?php echo e(number_format($totalPrice, 2)); ?></td>  <!-- Total Price -->
                    <td><?php echo e($status); ?></td>  <!-- Order status -->
                </tr>

                <!-- Loop through order details -->
                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> </td>
                        <td><?php echo e($item->productID); ?></td>  <!-- Access productID from product table -->
                        <td><?php echo e($item->productName); ?></td>  <!-- Access productName from product table -->
                        <td><?php echo e($item->quantity); ?></td>  <!-- Access quantity from orderDetails table -->
                        <td>$<?php echo e(number_format($item->productPrice * $item->quantity, 2)); ?></td>  <!-- Total Price -->
                        <td><?php echo e($item->status ?? 'No status'); ?></td>  <!-- Access status from orderDetails table -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Order not found.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/BAD Final Project/BAD_FINALPROJECT/resources/views/order.blade.php ENDPATH**/ ?>