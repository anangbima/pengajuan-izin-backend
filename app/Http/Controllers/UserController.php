<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Melihat semua data user
    public function index($status = null, $role = null) {
        $user = User::filter($status)->role($role);

        return response()->json([
            'user'      => $user
        ], 200);
    }

    // Mengubah status user / verifikais user
    public function updateStatus (Request $request, User $user) {
        $updateUser = $user->update([
            'status'    => $request['status'],
        ]);

        if ($updateUser) {
            return response()->json([
                'message'   => 'Update Successfully'
            ], 200);
        }
    }

    // Mengubah role user
    public function changeRole (User $user) {
        $updateUser = $user->update([
            'role'      => 'verifikator',
        ]);

        if ($updateUser) {
            return response()->json([
                'message'   => 'Update Successfully'
            ], 200);
        }
    }

    // Manage update password
    public function updatePassword () {
        
    }
}
