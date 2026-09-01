<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('User', ["users" => $users]);
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view("User.show", ["user" => $users]);
    }

    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route("admin.home")->with("users_message", "User Deleted Successfully✨");
    }

    public function create()
    {
        return view("User.create");
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'     => ['required', 'string', 'min:3', 'max:255'],

            'email'    => ['required', 'email', 'unique:users,email'],

            'password' => ['required', 'min:8', 'max:20'],

            'role'     => ['required', 'in:admin,user'],

            'status'   => ['required', 'in:0,1'],

        ]);

        User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            'password' => Hash::make($request->password),
            "role"     => $request->role,
            "status"   => $request->status,
        ]);

        return redirect()->route("admin.home")
            ->with("users_message", "User Created Successfully 🎉");
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view("User.edit", ["user" => $users]);
    }

 public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([

        'name' => ['required', 'string', 'min:3', 'max:255'],

        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
        ],

        'password' => ['nullable', 'min:8', 'max:20'],

        'role' => ['required', 'in:admin,user'],

        'status' => ['required', 'in:0,1'],
    ]);

    $data = [
        'name'   => $request->name,
        'email'  => $request->email,
        'role'   => $request->role,
        'status' => $request->status,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('admin.home')
        ->with('users_message', 'User Updated Successfully ✨');
}

}
