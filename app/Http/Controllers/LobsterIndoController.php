<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LobsterIndo extends Controller
{
    public function destroy()
{
    $user = Auth::user();


    LobsterIndo::where('id_user', $user->id)->delete();

    $user->delete();

    return redirect()->route('home')->with('success', 'Account deleted successfully.');
}
}
