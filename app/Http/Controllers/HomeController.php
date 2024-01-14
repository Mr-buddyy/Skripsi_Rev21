<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $partnership = Partnership::get();
        $countNullLpj = Partnership::whereNull('lpj')->count();
        $user = User::get();
        $messages = Message::get()->count();
        $page = "dashboard";
        $role = "admin";
        return view("admin/pages/dashboard", compact('role', 'page', 'partnership', 'user', 'countNullLpj', 'messages'));
    }
    public function sponsorship()
    {
        $partnership = Partnership::all();
        $page = "sponsorship";
        $role = "sponsorship";
        return view("admin/pages/sponsorship", compact('role', 'page', 'partnership'));
    }
    public function akun()
    {
        $get = User::all();

        // dd($get->profile);
        $page = "akun";
        $role = "akun";
        return view("admin/pages/akun", compact('role', 'page', 'get'));
    }
    public function feedback()
    {
        $messages = Message::all();
        // dd($messages->profile);
        $page = "feedback";
        $role = "feedback";
        return view("admin.pages.feedback", compact('role', 'page', 'messages'));
    }
    public function edit_konten()
    {
        $page = "edit_konten";
        $role = "edit_konten";
        return view("admin/pages/edit_konten", compact('role', 'page'));
    }
    public function update(Request $request, $id)
    {
        $user =  User::where('id', $id)->first();
        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'role' => 'nullable',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $atributAsli = $user->getAttributes();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);

        // Memeriksa apakah model mengalami perubahan (berubah)
        if (!empty(array_diff_assoc($atributAsli, $user->getAttributes()))) {
            // Mencoba menyimpan perubahan
            if ($user->save()) {
                return redirect()->back()->with('success', 'Akun berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan perubahan pada akun');
            }
        } else {
            return redirect()->back()->with('error', 'Tidak ada perubahan pada akun');
        }
    }

    public function destroyAccount($id)
    {
        try {
            $account = User::findOrFail($id);

            $account->delete();

            return redirect()->back()->with('success', 'Akun berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus akun');
        }
    }
    public function destroyMessage($id)
    {
        try {
            $account = Message::findOrFail($id);

            $account->delete();

            return redirect()->back()->with('success', 'Pesan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Pesan');
        }
    }
}
