<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\updatePasswordRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        $usersTrashed = User::select('id', 'first_name', 'last_name')->onlyTrashed()->get();
        return view('users.usersIndex', [
            'users' => $users,
            'usersTrashed' => $usersTrashed
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return redirect()->route('users.index')->with('userCreated', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        return view('users.userEdit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index')->with('userUpdated', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('userDelete', 'Usuario deshabilitado correctamente');
    }

    public function restoreUser($id)
    {
        $user = User::withTrashed()->find($id)->restore();
        return redirect()->route('users.index')->with('userRestored', 'Usuario habilitado correctamente');
    }

    public function showProfile()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('users.userProfile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|unique:users,phone_number,' . $user->id,
        ]);

        $user->update($validatedData);
        return redirect()->route('home')->with('profileUpdated', 'Perfil actualizado correctamente');
    }

    public function updatePassword(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();

        $request->validate([
            'password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        if (!Hash::check($request->input('password'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'La contraseña actual no es válida.');
        }

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('home')->with('profileUpdated', 'Contraseña actualizada correctamente.');
    }
}
