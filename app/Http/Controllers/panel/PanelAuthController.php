<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelAuthController extends Controller
{
    /**
     * Display login page.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Login logic
     */
    public function login(Request $request): RedirectResponse
    {
        // Validate $request incoming data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Check if the data === storage data
        if(Auth::attempt([
            'email' => $credentials['email'], 
            'password' => $credentials['password'], 
            'group_id' => 1
        ])) {
            // Start user session
            $request->session()->regenerate();
            // Redirect users to the dashbard page
            return redirect()->intended('dashboard');
        }
        // Redirect user back with error msg
        return back()->with('error', 'This provided credentails do not matches our recordes, only admins are allowed to access the control panel');
    }

    /**
     * Logout logic
     */
    public function logout(Request $request)
    {
        //
    }

    /**
     * Display forget password page.
     */
    public function forgetPass()
    {
        return view('admin.reset.forget');
    }

    /**
     * Display reset password page.
     */
    public function resetPass()
    {
        return view('admin.reset.reset');
    }
}
