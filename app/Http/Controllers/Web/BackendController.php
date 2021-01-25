<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function showFormBackend(){
        $user = User::findOrFail(Auth::id());
        return view('backend.main',['data' => $user]);
    }
}
