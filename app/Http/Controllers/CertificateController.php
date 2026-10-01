<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('Certificate', ["certificate" => $certificates]);
    }

    public function show($id)
    {
        $certificates = Certificate::findOrFail($id);
        return view("Certificate.show", ["certificate" => $certificates]);
    }

    public function delete($id)
    {
        $certificates = Certificate::findOrFail($id);
        $certificates->delete();
        return redirect()->route("admin.dashboard")->with("certificates_message", "Certificate Deleted Successfully✨");
    }

    public function create()
    {
        return view("Certificate.create");
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id'    => ['required', 'exists:users,id'],

            'course_id'  => ['required', 'exists:courses,id'],

            'issue_date' => ['nullable', 'date'],

            'status'     => ['required', 'in:valid,revoked'],

        ]);

        Certificate::create([

            'user_id'          => $request->user_id,

            'course_id'        => $request->course_id,

            'certificate_code' => 'CERT-' . strtoupper(Str::random(8)),

            'issue_date'       => $request->issue_date,

            'status'           => $request->status,

        ]);

        return redirect()
            ->route("admin.dashboard")
            ->with('certificates_message', 'Certificate Added Successfully 🎉');
    }

    public function edit($id)
    {
        $certificates = Certificate::findOrFail($id);
        return view("Certificate.edit", ["certificate" => $certificates]);
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);

        $request->validate([

            'user_id'    => ['required', 'exists:users,id'],

            'course_id'  => ['required', 'exists:courses,id'],

            'issue_date' => ['nullable', 'date'],

            'status'     => ['required', 'in:valid,revoked'],

        ]);

        $certificate->update([

            'user_id'    => $request->user_id,

            'course_id'  => $request->course_id,

            'issue_date' => $request->issue_date,

            'status'     => $request->status,

        ]);

        return redirect()
            ->route("admin.dashboard")
            ->with('certificates_message', 'Certificate Updated Successfully ✨');
    }
}
