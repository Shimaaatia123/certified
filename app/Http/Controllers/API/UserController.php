<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = UserResource::collection(User::all());
        $data  = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $users,
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $users = User::find($id);
        if ($users) {

            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new UserResource($users),
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ];
            return response()->json($data);
        }
    }

    public function destroy($id)
    {
        $users = User::find($id);
        if ($users) {
            $users->delete();
            $data = [
                "msg💌"    => "User Deleted Successfully 🗑️",
                "status📌" => 200,
                "data🌍"   => null,
            ];
            return response()->json($data);
        } else {
            $data = [
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ];
            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:20'],
            'role'     => ['required'],
            'status'   => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json([
            "msg💌"    => "User Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new UserResource($user),
        ]);
    }

   public function update(Request $request, $id)
{
    $user = User::find($id);

    if (! $user) {
        return response()->json([
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'name'     => ['required', 'string', 'min:3', 'max:255'],
        'email'    => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($user->id),
        ],
        'password' => ['nullable', 'string', 'min:8', 'max:20'],
        'role'     => ['required', 'in:admin,user'],
        'status'   => ['required', 'boolean'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            "msg💌"    => "Validation Required ❌",
            "status📌" => 422,
            "data🌍"   => $validator->errors(),
        ], 422);
    }

    $validated = $validator->validated();

    if (! empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return response()->json([
        "msg💌"    => "User Updated Successfully 🎉",
        "status📌" => 200,
        "data🌍"   => new UserResource($user->fresh()),
    ], 200);
}
}
