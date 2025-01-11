<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetails extends Model
{
    use HasFactory;

    // Table name and fillable fields for mass assignment
    protected $fillable = [
        'shoppingCartID', 'productID', 'quantity', 'pricePerItem',
    ];

    /**
     * Get the shopping cart associated with this detail.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingCartID', 'shoppingCartID');
    }

    /**
     * Get the product associated with this detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}