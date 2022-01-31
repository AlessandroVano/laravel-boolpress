<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Admin Home
     */

     public function index() {
        /*  return 'QUESTA è LA SEZIONE ADMIN'; */

         return view('home');
     }
}
