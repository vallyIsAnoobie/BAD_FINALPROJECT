<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function showMerch()
    {
        $firstName = session('firstName', 'Login');  // Default name if not found

        return view('merchandise', ['firstName' => $firstName]);
    }
}
