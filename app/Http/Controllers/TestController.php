<?php
// app/Http/Controllers/TestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showTestPage()
    {
        return view('test');  // Ensure 'test' is the correct Blade view file
    }
}
