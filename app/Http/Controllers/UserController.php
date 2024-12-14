<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users_query = User::with('roles')->orderBy('created_at','DESC');

// Поиск по ФИО
        if ($request->filled('login')) {
            $users_query->where('login', $request->get('login'));
        }

        if ($request->filled('email')) {
            $users_query->where('email', $request->get('email'));
        }

        $users = $users_query->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
            'roles' => 'required|array',
        ]);

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно создан.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => "required|unique:users,login,{$user->id}",
            'email' => "required|email|unique:users,email,{$user->id}",
            'roles' => 'required|array',
        ]);

        $user->update([
            'login' => $request->login,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно обновлен.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно удалён.');
    }


    public function messages()
    {
        return view('messages');
    }

    public function settings(Request $request)
    {
        return view('settings', [
            'user' => $request->user(),
        ]);
    }
}
