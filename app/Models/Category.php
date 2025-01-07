<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Table name and primary key
    protected $primaryKey = 'categoryID';

    // Fillable fields for mass assignment
    protected $fillable = [
        'categoryName', 'type', 'partner',
    ];

    /**
     * Get the products associated with this category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'categoryID', 'categoryID');
    }
}