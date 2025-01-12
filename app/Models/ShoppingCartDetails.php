<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetails extends Model
{
    use HasFactory;

    // Table name and fillable fields for mass assignment
    protected $fillable = [
        'shoppingCartID', 'productID', 'quantity',
    ];

    /**
     * Get the shopping cart associated with this detail.
     */
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingCartID', 'shoppingCartID');
    }

    public function getShoppingCartDetailWithProduct($detailID)
{
    // Find the shopping cart detail by ID
    $detail = ShoppingCartDetails::with('shoppingCart', 'product')->find($detailID);

    if (!$detail) {
        // Handle case when detail is not found
        return response()->json(['message' => 'Detail not found'], 404);
    }

    // Return the detail along with associated shopping cart and product
    return response()->json($detail);
}

    /**
     * Get the product associated with this detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'productID');
    }
}