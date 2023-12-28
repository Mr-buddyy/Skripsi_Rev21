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
        // $photos = User::where('id', $data->id)->with('role', 'mahasiswa')->first();
        // $photos = User::where(function ($query) {
        //     $query->where('role', 'sponsor');
        // })->get();


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
        // $photos = User::where('role', 'sponsor')->with('partnership')->get();

        $photos = User::with('partnership')->where('role', 'sponsor')->get();
        // dd($photos);
        return view("/mahasiswa/pages/home", compact('photos'));
    }
    public function sponsorship()
    {
        // mengambil id yang sedang login
        $userId = Auth::user()->id;
        // dd($userId);
        // $profile = Partnership::where('mahasiswa_id', $userId)->get();
        // dd($profile);
        // $partnership = User::where('id', $profile->sponsor_id)->first();
        // dd($partnership);

        //mengambil data pada tabel partnership dengan mahasiswa_id adalah id yang sedang login
        $profile = Partnership::where('mahasiswa_id', $userId)->get();
        // Mengambil semua nilai sponsor_id dari $profile
        $sponsorIds = $profile->pluck('sponsor_id');
        // Mengambil semua data User yang sesuai dengan sponsor_ids
        // $partnership = User::whereIn('id', $sponsorIds)->with('partnership')->get();
        $partnership = Partnership::with('sponsor')->whereHas('sponsor')->where('mahasiswa_id', auth()->user()->id)->get();
        $role = "mahasiswa";
        return view("mahasiswa.pages.sponsorship", compact('role', 'partnership'));
    }
    public function sponsor()
    {
        $loggedInUserId = Auth::id();

        $photos = User::where('role', 'sponsor')
            ->whereDoesntHave('partnership', function ($query) use ($loggedInUserId) {
                $query->where('mahasiswa_id', $loggedInUserId);
            })
            ->get();        // dd($photos);
        // dd($photos->profile->jumlah_peserta);
        $role = "mahasiswa";
        return view("mahasiswa.pages.partnership.sponsor.sponsor", compact('role', 'photos'));
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
