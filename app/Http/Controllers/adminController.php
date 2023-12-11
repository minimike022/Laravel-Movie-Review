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

    public function searchMovies(Request $request)
    {
        $searchMov = $request->get('searchValue');
        $data = movieInfo::where('movieTitle', 'LIKE', '%' . $searchMov . '%')->get();
        $output = '';

        foreach ($data as $row) {
            $output .= "
                <td>
                <a href='movies/viewMovies/".$row->movieID. "'>
                <div class= text-black flex flex-col justify-center items-center'>
                    <img src='".$row->moviePhoto."' class='h-[15em] w-[17em]' alt=''>
                    <div class='flex- justify-center'>
                        <h1 class='text-xl font-bold'>".$row->movieTitle."</h1>
                    </div>
                </div>
                </a>
                <div class='flex justify-between w-[13em]'>
                        <a href='movies/".$row->movieID."/edit'
                            class= 'bg-blue-500 border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg text-white font-bold'>Update</a>
                        <form action='{{route('movies.destroy', $row->movieID)}}' method='post'>
                            @csrf
                            <?php
                                
                            ?>
                            <button type='submit'
                                class='bg-red-500 border-2 h-[2.5em] w-[6em] flex justify-center items-center rounded-lg text-white font-bold'>Delete</button>
                        </form>

                    </div>
                </td>
            
            
            ";
            
        }
        return $output;

    }
}
