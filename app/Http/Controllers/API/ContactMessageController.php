<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactMessageResource;
use App\Models\Contact_Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contacts = ContactMessageResource::collection(Contact_Message::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $contacts,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $contacts = Contact_Message::find($id);

        if ($contacts) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new ContactMessageResource($contacts),
            ];

            return response()->json($data);
        }

        $data = [
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $contacts = Contact_Message::find($id);

        if ($contacts) {
            $contacts->delete();

            $data = [
                "msg💌"    => "Contact_Message Deleted Successfully 🗑️",
                "status📌" => 200,
                "data🌍"   => null,
            ];

            return response()->json($data);
        }

        $data = [
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => ['required', 'string', 'min:3', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $contact = Contact_Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status'  => 'new',
        ]);

        return response()->json([
            "msg💌"    => "Message Sent Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ContactMessageResource($contact),
        ]);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact_Message::find($id);

        if (! $contact) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name'    => ['sometimes', 'required', 'string', 'min:3', 'max:255'],
            'email'   => ['sometimes', 'required', 'email', 'max:255'],
            'subject' => ['sometimes', 'nullable', 'string', 'max:255'],
            'message' => ['sometimes', 'required', 'string', 'min:10'],
            'status'  => ['sometimes', 'required', 'in:new,read,replied'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ]);
        }

        $data = $validator->validated();

        $contact->update($data);

        return response()->json([
            "msg💌"    => "Contact Message Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new ContactMessageResource($contact),
        ]);
    }
}
