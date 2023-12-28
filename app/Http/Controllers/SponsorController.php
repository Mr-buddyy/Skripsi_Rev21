<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SponsorController  extends Controller
{
    public function sponsorship()
    {
        $userId = Auth::user()->id;
        $partnership = Partnership::where('sponsor_id', $userId)->get();
        $page = "sponsorship";
        $role = "sponsorship";
        return view("sponsor.pages.sponsorship", compact('role', 'page', 'partnership'));
    }
}
