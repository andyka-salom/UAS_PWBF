<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LobsterIndo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LobsterIndoController;
use App\Models\CabangPenangkaran;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:50',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        $user = Auth::user();
    
        LobsterIndo::where('id_user', $user->id)->delete();
    
        $user->delete();
    
        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
    

    public function editPassword()
    {
        return view('edit-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verifikasi password saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password.']);
        }

        // Ubah password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password updated successfully.');
    }
}

