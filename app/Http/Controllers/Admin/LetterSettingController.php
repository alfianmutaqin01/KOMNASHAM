<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LetterSettingController extends Controller
{
    public function index()
    {
        if (!Auth::user()->hasRole('admin')) { 
            abort(403, 'Anda tidak memiliki akses ke pengaturan ini.');
        }
        return view('admin.settings.letter');
    }
}