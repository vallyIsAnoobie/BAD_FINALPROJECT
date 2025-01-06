<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'payment_methods';

    // Define the primary key (optional if it is `id`)
    protected $primaryKey = 'paymentMethodID';

    // Specify if the primary key is non-incrementing or non-numeric
    public $incrementing = false;
    protected $keyType = 'string';

    // Specify fillable fields for mass assignment
    protected $fillable = [
        'paymentMethodID',
        'bankID',
        'epaymentID',
    ];

    // Define the relationship with BankAccount
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class, 'bankID', 'bankID');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'paymentMethodID', 'paymentMethodID');
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'paymentMethodID', 'paymentMethodID'); 
    }
    public function ePayments()
    {
        return $this->hasMany(Epayment::class, 'epaymentID', 'epaymentID');
    }
}