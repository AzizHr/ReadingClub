<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'is_admin' => 0
        ];

        return view('admin.dashboard.user.index', ['users' => User::where($data)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('avatar'));
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        if($request->hasFile('avatar'))
        {
            $formFields['avatar'] = $request->file('avatar')->store('images' , 'public');
        }

        // Create User
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/')->with('message' , 'User created successfully');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required' , 'email'],
        ]);

        $user = User::where('id' , auth()->user()->id);
        $user->update($data);

        return redirect(route('user.profile'))->with('message' , 'Profile info updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


       $user = auth()->attempt($data);

       if($user)
       {
        if(auth()->user()->is_admin) {
            $request->session()->regenerate();
            return redirect(route('dashboard.books'));
        } else {
            $request->session()->regenerate();
            return redirect(route('books'));
        }
       }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
