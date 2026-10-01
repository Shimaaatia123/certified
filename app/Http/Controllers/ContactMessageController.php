<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact_Message;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $contacts = Contact_Message::all();
        return view('Contact_Message', ["contact" => $contacts]);
    }

    public function show($id)
    {
        $contacts = Contact_Message::findOrFail($id);
        return view("Contact_Message.show", ["contact" => $contacts]);
    }

    public function delete($id)
    {
        $contacts = Contact_Message::findOrFail($id);
        $contacts->delete();
        return redirect()->route("admin.dashboard")->with("contacts_message", "Contact_Message Deleted Successfully✨");
    }

    public function create()
    {
        return view("Contact_Message.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'min:3', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],

        ]);

        Contact_Message::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'status'  => 'new',
        ]);

        return redirect()->route("admin.dashboard")->with('contact_message', 'Message Sent Successfully 🎉');
    }

    public function edit($id)
    {
        $contacts = Contact_Message::findOrFail($id);
        return view("Contact_Message.edit", ["contact" => $contacts]);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact_Message::findOrFail($id);

        $data = $request->validate([

            'name'    => ['required', 'string', 'min:3', 'max:255'],

            'email'   => ['required', 'email', 'max:255'],

            'subject' => ['nullable', 'string', 'max:255'],

            'message' => ['required', 'string', 'min:10'],

            'status'  => ['required'],

        ]);

        $contact->update([

            'name'    => $data['name'],
            'email'   => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'status'  => $data['status'],

        ]);

        return redirect()->route("admin.dashboard")
            ->with('contacts_message', 'Contact Message Updated Successfully ✨');
    }

}
