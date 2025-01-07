<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'shippingID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'orderID', 'logisticsName', 'shippingType', 'shippingPrice', 'shippingDate',
    ];

    /**
     * Get the order associated with this shipping.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID', 'orderID');
    }
}