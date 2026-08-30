<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = CertificateResource::collection(Certificate::all());

        $data = [
            "msg💌"    => "Return All Data🔄",
            "status📌" => 200,
            "data🌍"   => $certificates,
        ];

        return response()->json($data);
    }

    public function show($id)
    {
        $certificate = Certificate::find($id);

        if ($certificate) {
            $data = [
                "msg💌"    => "Return One Of Point✅",
                "status📌" => 200,
                "data🌍"   => new CertificateResource($certificate),
            ];

            return response()->json($data);
        }

        $data = [
            "msg💌"    => "No Such ID ❌",
            "status📌" => 404,
            "data🌍"   => null,
        ];

        return response()->json($data, 404);
    }

    public function destroy($id)
    {
        $certificate = Certificate::find($id);

        if ($certificate) {
            $certificate->delete();

            $data = [
                "msg💌"    => "Certificate Deleted Successfully 🗑️",
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

        return response()->json($data, 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'    => ['required', 'exists:users,id'],
            'course_id'  => ['required', 'exists:courses,id'],
            'issue_date' => ['nullable', 'date'],
            'status'     => ['required', 'in:valid,revoked'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $data['certificate_code'] = 'CERT-' . strtoupper(Str::random(8));

        $certificate = Certificate::create($data);

        return response()->json([
            "msg💌"    => "Certificate Created Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new CertificateResource($certificate),
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::find($id);

        if (! $certificate) {
            return response()->json([
                "msg💌"    => "No Such ID ❌",
                "status📌" => 404,
                "data🌍"   => null,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'    => ['required', 'exists:users,id'],
            'course_id'  => ['required', 'exists:courses,id'],
            'issue_date' => ['nullable', 'date'],
            'status'     => ['required', 'in:valid,revoked'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg💌"    => "Validation Required ❌",
                "status📌" => 422,
                "data🌍"   => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $certificate->update($validated);

        return response()->json([
            "msg💌"    => "Certificate Updated Successfully 🎉",
            "status📌" => 200,
            "data🌍"   => new CertificateResource($certificate->fresh()),
        ], 200);
    }

    public function verify(Request $request)
    {
        $certificateCode = $request->query('certificate_id');

        if (! $certificateCode) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate ID is required.',
            ], 400);
        }

        $certificate = Certificate::with(['user', 'course'])
            ->where('certificate_code', $certificateCode)
            ->first();

        if (! $certificate) {
            return response()->json([
                'success' => false,
                'message' => 'Certificate not found.',
            ], 404);
        }

        $status = match ($certificate->status) {
            'valid'   => 'VALID',
            'revoked' => 'REVOKED',
            default   => strtoupper((string) $certificate->status),
        };

        $fingerprint = hash(
            'sha256',
            $certificate->certificate_code
            . '|' . $certificate->user_id
            . '|' . $certificate->course_id
            . '|' . $certificate->issue_date
        );

        return response()->json([
            'success'     => true,
            'certificate' => [
                'student' => $certificate->user->name,
                'course'  => $certificate->course->title,
                'issued'  => $certificate->issue_date,
                'status'  => $status,
                'hash'    => $fingerprint,
                'qr_url'  => url('/api/certificates/verify?certificate_id=' . urlencode($certificate->certificate_code)),
            ],
        ], 200);
    }
    
}
