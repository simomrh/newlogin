<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

        public function  __construct()  {
             $this->middleware('auth');
        }

    public function index()
    {
        $users = User::OrderBy('created_at' , 'DESC')->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profile = Profile::create([
            'city' => 'casa',
            'user_id'	 => $user->id,
            'gender' => 'Male',
            'bio'	 => 'Hello world',
            'facebook' => 'https://www.facebook.com',
           ]);
           return redirect()->route('users');
    }


    public function destroy($id)
    {
        $user =  User::find($id);
        $user->profile->delete($id);
        $user->delete();
        return redirect()->route('users');
    }
}
