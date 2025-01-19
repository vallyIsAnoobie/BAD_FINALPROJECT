<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'customerID';
    protected $keyType = 'string'; // Adjust if the key type is not integer
    public $incrementing = false; // Adjust based on your setup
    public $timestamps = false; // If not using created_at and updated_at

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

    public function getFirstNameAttribute()
    {
        $nameParts = explode(' ', $this->customerName);
        return $nameParts[0];  // First part of the name
    }

    public function getLastNameAttribute()
    {
        $nameParts = explode(' ', $this->customerName);
        return $nameParts[1] ?? '';  // Second part of the name, default to empty if it doesn't exist
    }
}


