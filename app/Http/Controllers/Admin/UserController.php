<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

        if (!auth()->user()->hasRole('admin')) { 
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('admin.users.index');
    }
}