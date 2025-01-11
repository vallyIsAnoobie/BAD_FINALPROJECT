<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'paymentID';

    // Fillable fields for mass assignment
    protected $fillable = ['paymentMethodID', 'orderID', 'totalPrice', 'paymentDate'];

    /**
     * Get the payment method associated with this payment.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethodID', 'paymentMethodID');
    }

    /**
     * Get the order associated with this payment.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID', 'orderID');
    }
}