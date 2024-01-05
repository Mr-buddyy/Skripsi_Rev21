<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfileController  extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    // insert data profil ke database
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'photo_account' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'telpon' => 'nullable|string',
        ]);
        $data = ([
            'about' => $request->input('about') ?? ($user->profile ? $user->profile->about : null),
            'deskripsi' => $request->input('deskripsi') ?? ($user->profile ? $user->profile->deskripsi : null),
            'nama_universitas' => $request->input('nama_universitas') ?? ($user->profile ? $user->profile->nama_universitas : null),
            'telpon' => $request->input('telpon') ?? ($user->profile ? $user->profile->telpon : null),
            'alamat' => $request->input('alamat') ?? ($user->profile ? $user->profile->alamat : null),
            'name' => $request->input('name') ?? $user->name,
            'email' => $request->input('email') ?? $user->email,
            'nama_perusahaan' => $request->input('nama_perusahaan') ?? ($user->profile ? $user->profile->nama_perusahaan : null),
            'jumlah_peserta' => $request->input('jumlah_peserta') ?? ($user->profile ? $user->profile->jumlah_peserta : null),
        ]);
        // Periksa dan simpan gambar foto akun jika ada
        if ($request->hasFile('photo_account')) {
            $photoAccountPath = $request->file('photo_account')->store('photo-account');
            $data['photo_account'] = $photoAccountPath;
        }

        // Periksa dan simpan gambar foto sampul jika ada
        if ($request->hasFile('photo_cover')) {
            $photoCoverPath = $request->file('photo_cover')->store('photo-cover');
            $data['photo_cover'] = $photoCoverPath;
        }

        // Periksa dan simpan gambar foto perusahaan jika ada
        if ($request->hasFile('photo_perusahaan')) {
            $photoPerusahaanPath = $request->file('photo_perusahaan')->store('photo-perusahaan');
            $data['photo_perusahaan'] = $photoPerusahaanPath;
        }
        // Cek apakah profil pengguna sudah ada
        if ($user->profile) {
            $userData = [
                'name' => $request->input('name') ?? $user->name,
                'email' => $request->input('email') ?? $user->email,
            ];
            $user->update($userData);
            $user->profile->update($data);
            return redirect()->route('profile.page')->with('success', 'Profil berhasil diperbarui');
        } else {
            $user->profile()->create($data);
            return redirect()->route('profile.page')->with('success', 'Profil berhasil diperbarui');
        }
        return redirect()->route('profile.page')->with('error', 'Gagal menyimpan perubahan pada profil');
        // $page = "profile";
        // $role = "profile";
        // $atributAsli = $user->getAttributes();


        // if (Auth::check() && $this->user->role == 'sponsor') {
        //     return redirect()->route('profile.page', compact('role', 'page'));
        // } else if (Auth::check() && $this->user->role == 'mahasiswa') {
        //     return redirect()->route('profile.page', compact('role', 'page'));
        // } else if (Auth::check() && $this->user->role == 'admin') {
        //     return redirect()->route('profile.page', compact('role', 'page'));
        // }
    }
    public function EditProfile()
    {
        $user = Auth::user();
        if (Auth::check() && $this->user->role == 'admin') {
            $page = "profil";
            return view("admin.pages.profile.editprofile", compact('page'));
        } else if (Auth::check() && $this->user->role == 'sponsor') {
            $page = "profile";
            return view("sponsor.pages.profile.editprofile", compact('page'));
        } else if (Auth::check() && $this->user->role == 'mahasiswa') {
            $role = "mahasiswa";
            return view("mahasiswa.pages.profile.editprofile", compact('role'));
        }
    }
    public function Profile(Request $request)
    {
        $user = Auth::user();
        // dd(auth()->user()->profile->photo_cover);
        if (Auth::check() && $this->user->role == 'admin') {
            $page = "profil";
            $role = "profil";
            return view("admin.pages.profile.profile", compact('role', 'page', 'user'));
        } else if (Auth::check() && $this->user->role == 'sponsor') {
            $page = "profile";
            $role = "profile";
            return view("sponsor.pages.profile.profile", compact('role', 'page', 'user'));
        } else if (Auth::check() && $this->user->role == 'mahasiswa') {
            $role = "mahasiswa";
            return view("/mahasiswa/pages/profile/profile", compact('role', 'user'));
        }
    }
}
