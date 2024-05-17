<?php
// app/Controllers/AdminController.php

namespace App\Controllers;

use CodeIgniter\Controller;

class WebsiteController extends Controller
{
    public function packages()
    {

        return view('website/packages');
    }
}
