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
        return redirect()->route("home")->with("users_message", "User Deleted Successfully✨");
    }

    public function create()
    {
        return view("User.create");
    }

    public function store(Request $request)
    {

        $request->validate([

            'id'       => ['required', 'unique:users,id'],

            'name'     => ['required', 'string', 'min:3', 'max:255'],

            'email'    => ['required', 'email', 'unique:users,email'],

            'password' => ['required', 'min:8', 'max:20'],

            'role'     => ['required'],

            'status'   => ['required'],

        ]);

        User::create([
            "id"       => $request->id,
            "name"     => $request->name,
            "email"    => $request->email,
            'password' => Hash::make($request->password),
            "role"     => $request->role,
            "status"   => $request->status,

        ]);
        return redirect()->route("home")->with("users_message", "User Added Successfully 🎉");
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view("User.edit", ["user" => $users]);
    }

    public function update(Request $request)
    {
        $old_id = $request->old_id;

        $users = User::findOrFail($old_id);

        $request->validate([

            'id'       => [
                'required',
                Rule::unique('users', 'id')->ignore($old_id),
            ],

            'name'     => 'required|min:3|max:255',

            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($old_id),
            ],

            'password' => 'nullable|min:6',

            'role'     => 'required',

            'status'   => 'required',
        ]);

        $data = [

            "id"     => $request->id,
            "name"   => $request->name,
            "email"  => $request->email,
            "role"   => $request->role,
            "status" => $request->status,
        ];

        if ($request->filled('password')) {

            $data['password'] = Hash::make($request->password);
        }

        $users->update($data);

        return redirect()->route("home")
            ->with("users_message", "Updated User Successfully✨");
    }

}
