<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Hash; 

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::all();
        return view('users.list_user', compact('User'));
    }

    public function search(Request $request)
    {
        $User=collect();
        $query = $request->input('query');
        $User = User::where('name', 'like', "%{$query}%")->paginate(5);
        return view('users.search', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users', 
            'usertype' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string', 
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'num_burau'=>'string' 
        ]);
    
        // Handle profile picture upload (assuming public storage)
        if ($request->hasFile('profile_photo')) {
            $imageName = time() . '.' . $request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->storeAs('profile_pictures', $imageName, 'public'); // Store in public/profile_pictures
    
            $validatedData['profile_photo_path'] = $imageName;
        }
    
        // Hash the password before storing
        $validatedData['password'] = Hash::make($request->password);
    
        User::create($validatedData);
    
        return redirect()->route('user.index')->with('message', 'Stored Successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $User = User::findOrFail($user);
        return view('users.details', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $User = User::findOrFail($user);
        return view('users.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'usertype' => 'required|string',            
            'phone' => 'string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Define image validation rules
        ]);

        $existingUser = User::findOrFail($user);

        // Handle profile picture upload (assuming public storage)
        if ($request->hasFile('profile_photo')) {
            $imageName = time() . '.' . $request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->storeAs('profile_pictures', $imageName, 'public'); // Store in public/profile_pictures

            $validatedData['profile_photo_path'] = $imageName;

            // If updating image, consider deleting the old image (optional)
            if ($existingUser->profile_photo_path) {
                Storage::disk('public')->delete('profile_pictures/' . $existingUser->profile_photo_path);
            }
        }
        $validatedData['email'] =$request->email;
        $validatedData['num_bureau'] =$request->num_bureau;
        $validatedData['password'] = Hash::make($request->password);
        $existingUser->update($validatedData);

        return redirect()->route('user.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $User=User::findOrFail($user);
        $User->delete();
        return redirect()->route('user.index')->with('message','Deleted Successfuly');

    }}