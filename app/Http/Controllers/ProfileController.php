<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('profile');  // Ensure the 'menu' view exists
    }
}
