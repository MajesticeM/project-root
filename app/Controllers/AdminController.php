<?php
// app/Controllers/AdminController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel; 

class AdminController extends Controller
{
    public function index()
    {
       // Load all coaches and athletes
       $userModel = new UserModel();
       $coaches = $userModel->where('user_type', 'coach')->findAll();
       $athletes = $userModel->where('user_type', 'athlete')->findAll();

       return view('admin/dashboard', [
           'coaches' => $coaches,
           'athletes' => $athletes,
       ]);
    }

    public function approveUser($userId)
    {
        // Approve user by updating the status
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 'approved']);

        return redirect()->to('/admin');
    }

    public function declineUser($userId)
    {
        // Decline user by updating the status
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 'declined']);

        return redirect()->to('/admin');
    }

    public function suspendUser($userId)
    {
        // Suspend user by updating the status
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 'suspended']);

        return redirect()->to('/admin');
    }
}
