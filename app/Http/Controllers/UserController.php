<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        return view('Pages.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pages.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request,
        [
            'id' => 'required',
            'First_Name' => 'required',
            'Last_Name'=> 'required',
            'Middle_Name'=> 'required',
            'Gender'=> 'required',
            'birthdate'=> 'required',
            'address'=> 'required',
        ]);
        UserInfo::create($validatedData);
        return redirect(route('users.index'))->with('userData', $validatedData);

        
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
    public function userReviews(){
        return view('Pages.review');
    }

    public function userInfoForms() {
        return view('Pages.userInfoForms');
    }
}
