<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request, User $user){
        return view('users.create');
    }

    function store(Request $request, User $user){
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'string', Rule::unique('users', 'email'), 'max:255', 'min:3'],
            'password' => ['required', 'string', 'max:255', 'min:3'],
        ]);
        // dd($request);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save()){
            session()->flash("success", "You have been registered");
            return redirect('/login');
        }
        // $user->create($request->all());
    }

    function loginView(Request $request, User $user){
        return view('users.login');
    }

    function login(Request $request, User $user){
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'min:3'],
            'password' => ['required', 'string', 'max:255', 'min:3'],
        ]);
        if(Auth::attempt(['name' => $request->username, 'password' => $request->password])){
            return redirect('/products');
        }else{
            dd();
            // return response("Login failed.");
        }
        // return redirect('/login');
    }

    function logout(Request $request, User $user){
        Auth::logout();
        return redirect('/products');
    }
}
