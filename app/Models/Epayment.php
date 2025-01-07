<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epayment extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'epaymentID';

    // Fillable fields for mass assignment
    protected $fillable = ['QRIS', 'phoneNumber', 'paymentMethodID'];

    /**
     * Get the payment method associated with this e-payment.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethodID', 'paymentMethodID');
    }
}
