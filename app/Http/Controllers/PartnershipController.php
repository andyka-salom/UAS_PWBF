<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partnership;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::all();

        return view('partnership', compact('partnerships'));
    }

    public function show($id)
    {
        $partnershipshow = Partnership::find($id);

        return view('partnershipshow', compact('partnershipshow'));
    }
}
