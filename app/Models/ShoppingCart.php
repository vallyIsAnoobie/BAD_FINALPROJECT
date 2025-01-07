<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    // Table name and primary key
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