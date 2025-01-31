<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\MedicalStaffVerification;

class ManagerVerificationApprovalController extends Controller
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('app/settings.json');
    }
    public function approve(request $request,$verificationID){
        // dd($verificationID);

        MedicalStaffVerification::find($verificationID)->update([
            'approval'=>true
        ]);
        if (!File::exists($this->filePath)) {
            return response()->json(['error' => 'Settings file not found'], 404);
        }
        $verification = MedicalStaffVerification::find($verificationID);
        $settings = json_decode(File::get($this->filePath), true);

        if ($verification && isset($settings['email_notifications']) && $settings['email_notifications']) {
            // Ensure that the related models exist before accessing properties
            if ($verification->medicalStaff && $verification->medicalStaff->user && $verification->medicalStaff->user->email) {
                // Send email
                Mail::raw('The manager has approved your verification for their sanctuaries.', function ($message) use ($verification) {
                    $message->to($verification->medicalStaff->user->email)
                            ->subject('Your verification has been approved')
                            ->from('junelson2002@gmail.com', 'CatDatabase');
                });
            } else {
                Log::error("Email sending failed: User email not found for verification ID $verificationID");
            }
        } else {
            Log::error("Email notifications are disabled or verification ID $verificationID not found.");
        }
        return redirect()->route('manager.verification.list');
    }
    public function decline(Request $request,$verificationID){
        $verification = MedicalStaffVerification::find($verificationID);
        MedicalStaffVerification::find($verificationID)->delete();
        if (!File::exists($this->filePath)) {
            return response()->json(['error' => 'Settings file not found'], 404);
        }
        // $verification = MedicalStaffVerification::find($verificationID);
        $settings = json_decode(File::get($this->filePath), true);

        if ($verification && isset($settings['email_notifications']) && $settings['email_notifications']) {
            // Ensure that the related models exist before accessing properties
            if ($verification->medicalStaff && $verification->medicalStaff->user && $verification->medicalStaff->user->email) {
                // Send email
                Mail::raw('The manager has not approved your verification for their sanctuaries.', function ($message) use ($verification) {
                    $message->to($verification->medicalStaff->user->email)
                            ->subject('Your verification has been declined')
                            ->from('junelson2002@gmail.com', 'CatDatabase');
                });
            } else {
                Log::error("Email sending failed: User email not found for verification ID $verificationID");
            }
        } else {
            Log::error("Email notifications are disabled or verification ID $verificationID not found.");
        }
        return redirect()->route('manager.verification.list');
    }
}
