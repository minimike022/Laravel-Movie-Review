<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reviews;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MoviesController;
use App\Models\UserInfo;
use App\Models\movieInfo;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $this->validate($request, 
        [
            'userID' => 'required',
            'movieID' => 'required',
            'rating' => 'required',
            'reviews' => 'required'
        ]);
        reviews::create($validatedData);

        return redirect('/movies/viewMovies/'.$request->movieID);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
 }
