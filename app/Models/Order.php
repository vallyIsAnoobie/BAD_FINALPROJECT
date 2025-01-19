<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'orderID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'customerID', 'shoppingCartID', 'shippingPrice', 
        'tax', 'orderDate', 'orderStatus', 'purpose', 'orderNotes'
    ];
    protected $table = 'orders';
    protected $keyType = 'string';

    /**
     * Get the customer associated with this order.
     */
    public function customer() {
        return $this->belongsTo(Customer::class, 'customerID');
    }

    /**
     * Get the shopping cart associated with this order.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingCartID', 'shoppingCartID');
    }

    /**
     * Get the payment associated with this order.
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'orderID', 'orderID');
    }

    /**
     * Get the shipping associated with this order.
     */
    public function shipping()
    {
        return $this->hasOne(Shipping::class, 'orderID', 'orderID');
    }

    /**
     * Get the products associated with this order.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'orderID', 'productID')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    /**
     * Get the order details associated with this order.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'orderID');
    }

}
