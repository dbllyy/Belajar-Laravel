<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $users = User::all();
            return view('users', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'requaired|max:255',
    //         'email' => 'requaired|unique:users|max:255',
    //         'password' => 'requaired|max:255',
    //     ]);

    //     $user =  User::created($validatedData);
        
    //     return redirect()->route('users.show', $user->id)
    //         ->with('success', 'User created successfully.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'requaired|max:255',
            'email' => 'requaired|unique:users|max:255',
            'password' => 'requaired|max:255',
        ]);

        User::whereId($id)->update($validatedData);
        
        return redirect()->route('users.show', $id)
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
