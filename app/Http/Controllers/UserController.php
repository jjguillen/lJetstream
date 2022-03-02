<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index() {

        if (Cache::has('usuarios')) {
            $usuarios = Cache::get('usuarios');
        } else {
            $usuarios = User::all();
            Cache::put('usuarios', $usuarios, now()->addMinutes(10));
        }
       
        return view('users',[ 'usuarios' => $usuarios]);
    }
}
