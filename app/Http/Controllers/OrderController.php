<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function showOrder()
    {
        // Directly return the order page without any data processing
        return view('order');
    


        $firstName = session('firstName', 'Login');  // Default name if not found

        return view('menu', ['firstName' => $firstName]);
}
    public function showOrderSummary($orderId)
    {
        // Simulating "No Order" by hardcoding the absence of order details
        $noOrder = true;  // Simulate no order found
        $order = null;    // No order found
        $orderDetails = [];  // Empty order details
        $totalItems = 0;
        $totalPrice = 0;
        $status = null;

        // Simulate having an order with details if orderId == 1
        if ($orderId == 1) {
            $noOrder = false; 
            $order = (object)[
                'orderStatus' => 'Pending'
            ];
            $orderDetails = collect([
                (object)[
                    'productName' => 'Sample Product',
                    'productID' => 1,
                    'quantity' => 2,
                    'productPrice' => 100
                ]
            ]);
            $totalItems = 2;
            $totalPrice = 200;
        }

        // Return the view with the simulated order or no order scenario
        return view('order', compact('order', 'orderDetails', 'totalItems', 'totalPrice', 'status', 'noOrder'));
    }
}




