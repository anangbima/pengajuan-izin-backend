<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Melihat semua data user
    public function index() {
        $user = User::get();

        return response()->json([
            'user'      => $user
        ], 200);
    }

    // Mengubah status user
    public function updateStatus (User $user) {
        
    }
}
