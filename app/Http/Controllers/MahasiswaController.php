<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Models\Profile;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MahasiswaController extends Controller
{
    protected $user;

    public function __construct()
    {
        $user = Auth::user();
        $role = "mahasiswa";
        View::share('role', $role);
        View::share('user', $user);
    }
    public function message(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi. Silahkan masukkan nama Anda.',
            'email.required' => 'Email wajib diisi. Silahkan masukkan email Anda.',
            'pesan.required' => 'Pesan wajib diisi. Silahkan masukkan pesan Anda.',
        ]);
        if ($validasi) {
            Message::create($validasi);
            return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
        } else {
            dd($validasi);
            return redirect('home#contact')->with('fail', 'Pesan gagal dikirim!');
        }
    }
    public function home()
    {
        $sponsors = User::with('partnership')->where('role', 'sponsor')->get();
        return view("/mahasiswa/pages/home", compact('sponsors'));
    }
    public function sponsorship()
    {
        // mengambil id yang sedang login
        $userId = Auth::user()->id;

        //mengambil data pada tabel partnership dengan mahasiswa_id adalah id yang sedang login
        $profile = Partnership::where('mahasiswa_id', $userId)->get();
        // Mengambil semua nilai sponsor_id dari $profile
        $sponsorIds = $profile->pluck('sponsor_id');
        // Mengambil semua data User yang sesuai dengan sponsor_ids
        $partnership = Partnership::with('sponsor')->whereHas('sponsor')->where('mahasiswa_id', auth()->user()->id)->get();
        $role = "mahasiswa";
        return view("mahasiswa.pages.sponsorship", compact('role', 'partnership'));
    }
    public function sponsor()
    {
        $loggedInUserId = Auth::id();

        $sponsors = User::where('role', 'sponsor')
            ->whereDoesntHave('partnership', function ($query) use ($loggedInUserId) {
                $query->where('mahasiswa_id', $loggedInUserId);
            })
            ->get();
        $role = "mahasiswa";
        return view("mahasiswa.pages.partnership.sponsor.sponsor", compact('role', 'sponsors'));
    }

    public function about()
    {

        $role = "mahasiswa";
        return view("/mahasiswa/pages/about");
    }
    public function contact()
    {

        $role = "mahasiswa";
        return view("/mahasiswa/pages/contact");
    }
    public function event()
    {

        $role = "mahasiswa";
        return view("/mahasiswa/pages/event");
    }
}
