<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	public function create()
	{
		return view('users.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
            'email' => 'required|unique:users',
    		'password' => 'required',
    		'password2' => 'required|same:password',

    	]);

    	$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'pass' => $request->password,
			'level' => $request->level,
			'user' => $request->user
		]);

    	return redirect(route('user.show'));
    }

    public function show()
    {
        $users = User::get([
            'id', 'name', 'email', 'pass', 'level'
        ]);

        return view('users.show', compact('users'));
    }

	function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    function update(Request $request)
    {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'password2' => 'required|same:password',

		]);

        User::find($request->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'pass' => $request->password,
			'level' => $request->level
        ]);

        return redirect(route('user.show'));
    }
}
