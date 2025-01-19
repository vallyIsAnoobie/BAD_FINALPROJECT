<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Show the order summary for the logged-in customer.
     */
    public function showOrderSummary()
    {
        // Retrieve the customerID and firstName from session
        $customerID = session('customerID');
        $firstName = session('firstName', 'Login');

        // Check if customerID exists in session
        if (!$customerID) {
            return redirect()->route('login')->with('error', 'Please log in to view your order summary.');
        }

        // Fetch the orders using the raw SQL query
        $orders = DB::table('orders')
            ->join('orderdetails', 'orders.orderID', '=', 'orderdetails.orderID')
            ->join('product', 'orderdetails.productID', '=', 'product.productID')
            ->join('customers', 'orders.customerID', '=', 'customers.customerID')
            ->join('shoppingcart', 'orderdetails.shoppingCartID', '=', 'shoppingcart.shoppingCartID')
            ->select(
                'orders.orderID',
                'customers.customerName',
                DB::raw('SUM(orderdetails.quantity) AS total_items'),
                'shoppingcart.totalPrice AS total_price',
                'orders.orderStatus'
            )
            ->where('orders.customerID', $customerID)
            ->groupBy('orders.orderID', 'customers.customerName', 'orders.orderStatus', 'shoppingcart.totalPrice')
            ->get();

        // Check if the orders exist
        if ($orders->isEmpty()) {
            return redirect()->route('order.create')->with('error', 'No orders found for this customer.');
        }

        // Return the view with the necessary data
        return view('order', [
            'orders' => $orders,
            'firstName' => $firstName
        ]);
    }
}
