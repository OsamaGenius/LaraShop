<?php

namespace App\Http\Controllers;

use App\Mail\SendingCodes;
use App\Mail\VerifyAccounts;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    
    /**
     * Login Page
     */
    public function loginView()
    {
        return view('user.login.index');
    }

    /**
     * Login Logic
     */ 
    public function loginAction(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);
        if(Auth::guard('web')->attempt([
            'email' => $data['username'], 
            'password' => $data['password'], 
            'group_id' => 0,
            'approvent' => 1
        ])):
            // User session generate
            $request->session()->regenerate();
            // Redirect authenticated user to homepage
            return redirect()->intended(route('home'));
        endif;
        // Redirect user back with error msg
        return back()->with('error', 'This provided credentails do not matches our recordes, please enter the right one.');
    }

    /**
     * Logout Logic
     */
    public function logout(Request $request)
    {
        // Logout admin user from the system
        Auth::guard('web')->logout();
        // Invalidate user session
        $request->session()->invalidate();
        // Regenerate user session
        $request->session()->regenerate();
        // Redirect user to login page
        return redirect()->route('login')->with('success', 'Successfully logged you out from LaraShop market.');
    }
    
    /**
     * Registration Page  
     */ 
    public function RegView()
    {
        return view('user.reg.index');
    }

    /** 
     * Registration Logic
     */
    public function RegAction(Request $request)
    {
        // Validate The incoming data
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'max:255'],
        ]);
        // Adding new User data
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        // Sending request verifiction email to the user
        $token = hash('sha256', time());
        $user->resetToken = $token;
        // Saving the data in the data storage
        $user->save();
        // Sending the msg
        $route = route('account.activation', [
            'token' => $token,
            'email' => $data['email']
        ]);
        $msg = 'Please click in this link to activate your account:<br>';
        $msg .= $route;
        Mail::to($data['email'])->send(new VerifyAccounts('Activate My Account', $msg));
        return redirect()->route('login')->with('success', 'Successfully added user ' . $data['name'] . ' data, please check your email for verifiction link.');
    }

    /** 
     * Account verifiction logic
     */ 
    public function activeAccount($token, $email)
    {
        $checked = User::where('resetToken', $token)->where('email', $email)->first();
        if(!$checked) {
            return redirect()->route('login')->with('error', 'The provided token or email incorrect.');
        } else {}
        $user = User::where('resetToken', $token)->where('email', $email)->update([
            'resetToken' => '',
            'approvent' => 1
        ]);
        if(!$user) {
            return redirect()->route('login')->with('error', 'Unable to activate your account right know, please try again later.');
        } else {}
        return redirect()->route('login')->with('success', 'Successfully activated your account, please feel free to login now.');
    }

    /**
     * Sending code page for password reset 
     */ 
    public function sendCodePage()
    {
        return view('user.pass.forget');
    }
    
    /**
     * Sending code page for password reset 
     */ 
    public function sendCodeAction(Request $request)
    {
        // Validate user email
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255']
        ]);
        // Fetch the target user
        $user = User::where('email', $data['email'])->first();
        // If not a valid user redirect with error
        if(!$user):
            return redirect()->back()->with('error', 'The provided email is not exsist in our storage');
        endif;
        // Generate reset token
        $token = hash('sha256', time());
        $user->resetToken = $token;
        $user->update();
        // Send Mail
        $link = route('reset.page', [
            'token' => $token, 
            'email' => $data['email']
        ]);
        $subject = 'Reset Password';
        $message = 'Please click in this link to reset your password:<br>';
        $message .= '<a href="'.$link.'">Reset My Password</a>';

        Mail::to($data['email'])->send(new SendingCodes($subject, $message));

        return redirect()->back()->with('success', 'Successfully send reset link to your email ' . $data['email']);
    }
    
    /**
     * Sending code page for password reset 
     */ 
    public function resetPage($token, $email)
    {
        // Fetch the target user
        $user = User::where('resetToken', $token)->where('email', $email)->first();
        // If not a valid user redirect with error
        if(!$user):
            return redirect()->back()->with('error', 'The provided email is not exsist in our storage');
        endif;
        // Redirect the user to reset password page
        return view('user.pass.reset', [
            'token' => $token,
            'email' => $email,
        ]); 
    }
    
    /**
     * Sending code page for password reset 
     */ 
    public function resetAction(Request $request, $token, $email)
    {
        // Checking the correct token and email
        $user = User::where('resetToken', $token)->where('email', $email)->first();
        // Redirect to login page if token or email invalid one
        if(!$user):
            return redirect()->route('login')->with('error', 'The provided token or email invalid.');
        endif;
        // Validate password
        $data = $request->validate([
           'password' => ['required', 'string', 'max:255'], 
           'confirm'  => ['required', 'string', 'max:255', 'same:password'], 
        ]);
        // Update current user data
        $user->resetToken = '';
        $user->password = Hash::make($data['password']);
        $user->update();
        // Redirect success
        return redirect()->route('login')->with('success', 'Successfully updated your password, please feel free to login.');
    }
    
}
