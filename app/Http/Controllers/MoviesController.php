<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movieInfo;
use App\Models\reviews;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = movieInfo::all();
        return view('Pages.movies', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'movieTitle' => 'required',
            'movieDescription' => 'required',
            'movieDate' => 'required',
            'movieGenre' => 'required',
            'moviePhoto' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        $files = $request->all();
        $imageName = time() . '.' . $request->moviePhoto->extension();
        $path = $request->moviePhoto->move(('moviePhoto'), $imageName);
        $files['moviePhoto'] = $path;



        movieInfo::create($files);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $movies = movieInfo::where('movieID', $id)->first();
        $movieTitle = $movies->movieTitle;

        return view('Pages.movies_update', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'movieTitle' => 'required',
            'movieDescription' => 'required',
            'movieDate' => 'required',
            'movieGenre' => 'required'
        ]);

        movieInfo::where('movieID', $id)->update($validatedData);

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movies = movieInfo::where('movieID', $id);
        $movies->delete();
        return redirect('/admin');
    }

    public function viewMovies($id)
    {
        $movies = movieInfo::where('movieID', $id)->first();
        $review = DB::table('reviews')
            ->join('user_info', 'user_info.id', '=', 'reviews.userID')
            ->where('movieID', $id)
            ->get();

        return view('Pages.viewMovies', compact('movies', 'review'));
    }

    public function searchMovies(Request $request)
    {
        $searchMov = $request->get('searchValue');
        $data = movieInfo::where('movieTitle', 'LIKE', '%' . $searchMov . '%')->get();

        $output = '';

        foreach ($data as $row) {
            $output .= '
                <td>
                <a href="movies/viewMovies/'.$row->movieID. '">
                <div>
                    <img src="'.$row->moviePhoto.'" class="h-[15em] w-[17em] backdrop-blur-lg" alt="">
                    <div
                        class="absolute bg-black h-[15em] w-[17em] top-[6em] opacity-0 hover:opacity-70 text-white flex justify-center items-center">
                        <h1 class="text-xl font-bold">'.$row->movieTitle.'</h1>
                    </div>
                </div>
                </a>
                </td>
            
            
            ';
            
        }
        return $output;

    }
}
