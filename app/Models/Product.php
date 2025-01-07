<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'productID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'categoryID', 'productName', 'productPrice', 'description', 'productImage',
    ];

    /**
     * Get the category this product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID', 'categoryID');
    }

    /**
     * Get the orders associated with this product.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'productID', 'productID');
    }

    /**
     * Get the order details associated with this product.
     */
    public function orderDetails()
    {
        return $this->hasOne(OrderDetails::class, 'productID', 'productID');
    }

    /**
     * Get the shopping cart details associated with this product.
     */
    public function shoppingCartDetails()
    {
        return $this->hasMany(ShoppingCartDetails::class, 'productID', 'productID');
    }
}