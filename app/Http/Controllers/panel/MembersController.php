<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.members.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Grap letest updated users
        $updated = User::where('approvent', '=', 1)->orderby('updated_at', 'desc')->get(['username', 'name', 'file', 'updated_at']);
        // Grap all users that is needing approvent
        $approvent = User::where('approvent', '=', 0)->orderby('updated_at', 'desc')->get(['username', 'name', 'file']);
        // Show create new user page
        return view('admin.members.add.index', [
            'updated' => $updated,
            'approvent' => $approvent
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data from user form
        $validator = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:'.User::class],
            'group_id'  => ['required', 'numeric'],
            'approvent' => ['required', 'numeric'],
            'password'  => ['required', 'string', 'max:255'],
        ]);
        // Save the user data inside the data storage
        $created = User::create([
            'name' => $validator['firstName'] . ' ' . $validator['lastName'],
            'email' => $validator['email'],
            'group_id' => $validator['group_id'],
            'approvent' => $validator['approvent'],
            'password' => $validator['password'],
            // 'password' => Hash::make($validator['password']),
        ]);
        // Success Status
        if($created) {
            return redirect()->route('members')->with('success', 'Successfully created user "'.$validator['firstName'].' '.$validator['lastName'].'" data.');
        }
        // Failure Status
        return redirect()->back()->with('error', 'unable to create user "'.$validator['firstName'].' '.$validator['lastName'].'" data, please contact the developer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Grap all the users
        $user = User::find($id);
        // Grap letest updated users
        $updated = User::where('approvent', '=', 1)->orderby('updated_at', 'desc')->get(['username', 'name', 'file', 'updated_at']);
        // Grap all users that is needing approvent
        $approvent = User::where('approvent', '=', 0)->orderby('updated_at', 'desc')->get(['username', 'name', 'file']);
        // Show edit users page
        return view('admin.members.edit.index', [
            'user' => $user,
            'updated' => $updated,
            'approvent' => $approvent
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data from user form
        $validator = $request->validate([
            'group_id'  => ['required', 'numeric'],
            'approvent' => ['required', 'numeric']
        ]);
        // Update user data
        $updated = User::where('id', $id)->update([
            'group_id' => $validator['group_id'],
            'approvent' => $validator['approvent']
        ]);
        // Success
        if($updated) {
            return redirect()->route('members')->with('success', 'Successfully updated user data.');
        }
        // Failure
        return redirect()->back()->with('error', 'Unable to update user data, please contact the developer.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Get user full name
        $user = User::find($id)->only('name');
        // Delete the given user
        $deleted = User::find($id)->delete();
        // Success
        if($deleted) {
            return redirect()->route('members')->with('success', 'Successfully deleted member "'.$user['name'].'" data.');
        }
        // Failure
        return redirect()->back()->with('error', 'Unable to delete member "'.$user['name'].'" data, please contact the developer.');
    }

    /**
     *   Change the status of the users when click 
     * approve icon in members table.
     */ 
    public function approve(string $id)
    {
        // Getting the given user name
        $user = User::Find($id)->only('name');
        // Update target user approvent status
        $approvent = User::where('id', $id)->update([
            'approvent' => 1
        ]);
        // Success
        if($approvent):
            return redirect()->back()->with('success', 'Successfully approved user "'.$user['name'].'" data.');
        endif;
        // Failure
        return redirect()->back()->with('error', 'Unable to approve user "'.$user['name'].'" data, please contact the developer.');
    }
}
