<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSystemSettingController extends Controller
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('app/settings.json');
    }
    public function index(){
        $page = "systemSettings";
        $settings= File::exists($this->filePath)
        ? json_decode(File::get($this->filePath), true)
        : [];
        return view("AdminSystemSettings",compact("page","settings"));
    }

    public function update(Request $request)
    {
        $data = [
            'email_notifications' => $request->has('email_notifications'),
        ];
        File::put($this->filePath, json_encode($data, JSON_PRETTY_PRINT));

        return redirect()->back();
    }
}
