<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'customerID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'paymentMethodID', 'customerName', 'phoneNumber', 
        'custEmail', 'DOB', 'gender', 'custAddress', 'password'
    ];

    /**
     * Get the payment method associated with this customer.
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethodID', 'paymentMethodID');
    }

    /**
     * Get the orders associated with this customer.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customerID', 'customerID');
    }

    /**
     * Get the shopping cart associated with this customer.
     */
    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class, 'customerID', 'customerID');
    }
}