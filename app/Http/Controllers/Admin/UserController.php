<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user || !$user->hasRole('admin')) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('admin.users.index');
    }
}
