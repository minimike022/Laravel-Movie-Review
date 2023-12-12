<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\UserInfo;
use App\Models\movieInfo;

class adminController extends Controller
{

    
    public function adminIndex() {
        $movies = movieInfo::all();

        $users = UserInfo::all();
        return view('Pages.admin')->with(compact('users', 'movies'));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/users');
    }


}
