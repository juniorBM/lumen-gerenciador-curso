<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
//use Illuminate\Support\Facades\Auth;


class UsersController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['except' => ['add']]);

    }
    public function add(Request $request)
    {
        $data = $request->all();

        $messages = [
            'name.required' => 'Nome Obrigatório!',
            'lastname.required' => 'Nome Obrigatório!',
            'email.unique' => 'Email já em uso!',
            'email.required' => 'Email já em uso!'
        ];

        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ], $messages);

        $data['password'] = app('hash')->make($data['password']);
        $user = User::create($data);
        $user->api_token = md5(str_random(32));
        $user->save();
        return response()->json(['status' => 'success', 'result' => $user]);

    }

    public function checkToken(Request $request)
    {
        $user = Auth::user();

        if ($user)
            return response()->json(['status' => 'success', 'result' => $user]);
    }

}
