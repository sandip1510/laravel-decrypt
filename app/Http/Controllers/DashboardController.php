<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    // Show the dashboard
    public function index()
    {
        return view('dashboard');
    }

    // Handle encryption/decryption
    public function encryptDecrypt(Request $request)
    {
        $data = $request->input('data');
        $action = $request->input('action');
        
        // Perform encryption or decryption based on the selected action
        if ($action == 'encrypt') {
            $result = Crypt::encrypt($data);
        } elseif ($action == 'decrypt') {
            try {
                $result = Crypt::decrypt($data);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                $result = 'Decryption failed. Invalid data or key.';
            }
        } else {
            $result = 'Invalid action selected.';
        }

        // Return the result to the view
        return redirect()->route('dashboard')->with('result', $result);
    }
}
