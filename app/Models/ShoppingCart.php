<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the model name convention
    protected $table = 'shoppingcart'; // Ensure this matches your actual table name

    // Primary key for the table
    protected $primaryKey = 'shoppingCartID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'customerID', 'totalItems', 'totalPrice',
    ];

    /**
     * Get the customer associated with this shopping cart.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerID', 'customerID');
    }

    /**
     * Get the order details associated with this shopping cart.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'shoppingCartID', 'shoppingCartID');
    }

    /**
     * Get the shopping cart details associated with this shopping cart.
     */
    public function shoppingCartDetails()
    {
        return $this->hasMany(ShoppingCartDetails::class, 'shoppingCartID', 'shoppingCartID');
    }
}
