<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showMenu()
    {
        $firstName = session('firstName', 'Login');  // Default name if not found

        return view('menu', ['firstName' => $firstName]);
    }
}
