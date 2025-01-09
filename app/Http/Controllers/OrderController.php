<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function showOrderSummary($orderId)
{
    // Fetch the order based on the order ID
    $order = Order::findOrFail($orderId);

    // Fetch order details for the specific order using the order_id
     // Use a JOIN to fetch the order details with the associated product data
     $orderDetails = DB::table('orderDetails')
     ->join('product', 'orderDetails.productID', '=', 'product.productID')  // JOIN products on product_id
     ->where('orderDetails.orderID', '=', $orderId)  // Filter by order ID
     ->select('orderDetails.*', 'product.productName', 'product.productID', 'product.productPrice')  // Select the columns you need
     ->get();

    // Calculate total items and total price
    $totalItems = $orderDetails->sum('quantity');
    $totalPrice = $orderDetails->sum(function ($detail) {
        return $detail->quantity * $detail->pricePerItem;
    });
    // Get the status of the order (assuming `status` is an attribute in the Order model)
    $status = $order->orderStatus;

    // Return the view with necessary data
    return view('order', compact('order', 'orderDetails', 'totalItems', 'totalPrice', 'status'));
}
}