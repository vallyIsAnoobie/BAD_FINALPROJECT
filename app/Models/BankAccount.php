<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'bank_accounts';

    // Define the primary key (optional if it is `id`)
    protected $primaryKey = 'bankID';

    // Specify if the primary key is non-incrementing or non-numeric
    public $incrementing = false;
    protected $keyType = 'string';

    // Specify fillable fields for mass assignment
    protected $fillable = [
        'bankID',
        'bankName',
        'cardNumber',
        'cardHolderName',
        'billingAddress',
    ];

    // Define the relationship with PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'bankID', 'bankID');
    }
}