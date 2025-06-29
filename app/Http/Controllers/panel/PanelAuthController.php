<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\SendingCodes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        if(Auth::guard('panel')->attempt([
            'email' => $credentials['email'], 
            'password' => $credentials['password'], 
            'group_id' => 1
        ])) {
            // Start user session
            $request->session()->regenerate();
            // Redirect users to the dashbard page
            return redirect()->intended(route('dashboard'));
        }
        // Redirect user back with error msg
        return back()->with('error', 'This provided credentails do not matches our recordes, only admins are allowed to access the control panel');
    }

    /**
     * Logout logic
     */
    public function logout(Request $request)
    {
        // Logout admin user from the system
        Auth::guard('panel')->logout();
        // Invalidate user session
        $request->session()->invalidate();
        // Regenerate user session
        $request->session()->regenerate();
        // Redirect user to login page
        return redirect()->route('admin.login')->with('success', 'Successfully logged out from the control panel.');
    }

    /**
     * Display forget password page.
     */
    public function forgetPass()
    {
        return view('admin.reset.forget');
    }

    public function forgetPassExec(Request $request)
    {
        // Validate request data
        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);
        // Check if their is a user with the provided email
        $admin = User::where('email', $data['email'])->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'The provided email is not exsist in our storage');
        }
        // Generate reset token
        $token = hash('sha256', time());
        $admin->resetToken = $token;
        $admin->update();
        // Send Mail
        $link = route('admin.pass.reset', [
            'token' => $token, 
            'email' => $data['email']
        ]);
        $subject = 'Reset Password';
        $message = 'Please click in this link to reset your password:<br>';
        $message .= '<a href="'.$link.'">Reset My Password</a>';

        Mail::to($data['email'])->send(new SendingCodes($subject, $data['email']));

        return redirect()->back()->with('success', 'Successfully send reset link to your email ' . $data['email']);
    }

    /**
     * Display reset password page.
     */
    public function resetPass($token, $email)
    {
        $admin = User::where('resetToken', $token)->where('email', $email)->first();
        if(!$admin) {
            return redirect()->route('admin.login')->with('error', 'The provided token or email is incorrect.');
        }
        return view('admin.reset.reset', [
            'token' => $token,
            'email' => $email
        ]);
    }

    /**
     * Display reset password logic.
     */
    public function resetPassExec(Request $request, $token, $email)
    {
        $admin = User::where('resetToken', $token)->where('email', $email)->first();
        if(!$admin) {
            return redirect()->route('admin.login')->with('error', 'Invalid token or email'); 
        }
        $data = $request->validate([
            'password' => ['required'],
            'new_password' => ['required', 'same:password'],
        ]);
        $admin->resetToken = '';
        $admin->password = Hash::make($data['password']);
        $admin->update();
        return redirect()->route('admin.login')->with('success', 'Successfully change email ' . $email . ' password.'); 
    }
    
}
