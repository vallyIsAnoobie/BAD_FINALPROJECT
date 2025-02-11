<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'orderDetailID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'orderID', 'productID', 'shoppingCartID', 'quantity', 'pricePerItem',
    ];
    protected $table = 'orderDetails';

    /**
     * Get the order associated with this order detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }

    /**
     * Get the product associated with this order detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }

    /**
     * Get the shopping cart associated with this order detail.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingCartID', 'shoppingCartID');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID');
    }
}

