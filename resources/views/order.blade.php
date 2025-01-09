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
    @if($order)
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
                    <td>{{ $order->orderID }}</td>  <!-- Order ID -->
                    <td>{{ $order->productName }}</td>  <!-- This assumes `product_name` is an attribute of the `Order` model -->
                    <td>{{ $order->productID }}</td>  <!-- Product ID -->
                    <td>{{ $totalItems }}</td>  <!-- Total Items -->
                    <td>${{ number_format($totalPrice, 2) }}</td>  <!-- Total Price -->
                    <td>{{ $status }}</td>  <!-- Order status -->
                </tr>

                <!-- Loop through order details -->
                @foreach ($orderDetails as $item)
                    <tr>
                        <td> </td>
                        <td>{{ $item->productID }}</td>  <!-- Access productID from product table -->
                        <td>{{ $item->productName }}</td>  <!-- Access productName from product table -->
                        <td>{{ $item->quantity }}</td>  <!-- Access quantity from orderDetails table -->
                        <td>${{ number_format($item->productPrice * $item->quantity, 2) }}</td>  <!-- Total Price -->
                        <td>{{ $item->status ?? 'No status' }}</td>  <!-- Access status from orderDetails table -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Order not found.</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>