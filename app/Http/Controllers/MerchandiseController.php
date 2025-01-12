<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function showMerch()
    {
        return view('merchandise');  // Ensure the 'menu' view exists
    }
}
