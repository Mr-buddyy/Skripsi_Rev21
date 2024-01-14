<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnershipRequest;
use App\Http\Requests\UpdatePartnershipRequest;
use App\Models\User;
use App\Models\Profile;
use Egulias\EmailValidator\Parser\PartParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartnershipController extends Controller
{

    // detail sponsor (name = details.show-page)
    public function details($id)
    {
        // variabel detail untuk menentukan id berdasarkan tabel profile kolom id
        $detail = User::find($id);
        // variabel user untuk menemukan user yang sedang login
        $user = Auth::user();
        // variabel partnership untuk menemukan data partnership berdasarkan id mahasiswa dan id sponsor
        $partnership = Partnership::where('mahasiswa_id', $user->id)->where('sponsor_id', $detail->id)->first();
        $role = "mahasiswa";
        return view("mahasiswa.pages.partnership.sponsor.detail_sponsor", compact('detail', 'partnership'));
    }

    // request partnership (name = partnership.mahasiswa-page)
    public function partnership($id)
    {
        $detail = User::find($id);
        // variabel user untuk menemukan user yang sedang login
        $user = Auth::user();
        // variabel partnership untuk menemukan data partnership berdasarkan id mahasiswa dan id sponsor
        $partnership = Partnership::where('mahasiswa_id', $user->id)->where('sponsor_id', $detail->id)->first();
        // jika partnership kosong maka akan menampilkan halaman request
        if (empty($partnership)) {
            $page = "pending";
            return view('mahasiswa.pages.partnership.request 1.request', compact('detail', 'user', 'page'));
            // jika partnership dengan status pending maka akan menampilkan halaman requested (telah melakukan request)
        } else if ($partnership->status == 'pending') {
            return view('mahasiswa.pages.partnership.request 1.requested', [
                'partnership' => $partnership,
                'page' => 'pending'
            ]);
            // jika partnership dengan status accepted maka akan menampilkan halaman accepted (telah diterima)
        } else if ($partnership->status == 'accepted' && $partnership->pengirim == 'mahasiswa') {
            $page = "accepted";
            $a = $id;
            return view('mahasiswa.pages.partnership.request 3.request_succeed', compact('detail', 'user', 'page', 'a', 'partnership'));
        } else if ($partnership->status == 'accepted' || $partnership->pengirim == 'sponsor') {
            $pdfFilename = $partnership->mou;
            // dd($pdfFilename);
            if (Storage::disk('local')->exists('/' . $pdfFilename)) {
                $filePath = '/' . str_replace(['/', '\\'], '/', $pdfFilename);
                $pdfContents = Storage::disk('local')->get($filePath);
            }
            $page = "accepted";
            // dd($filePath = 'public/' . str_replace(['/', '\\'], '/', $pdfFilename));
            return view('mahasiswa.pages.partnership.request 2.requestaccepted', compact('detail', 'user', 'page', 'partnership', 'pdfContents', 'pdfFilename'));
            // jika partnership dengan status rejected maka akan menampilkan halaman rejected (telah ditolak)
        } else if ($partnership->status == 'rejected') {
            $page = "rejected";
            return view('mahasiswa.pages.partnership.request 1.requestrejected', compact('detail', 'user', 'page', 'partnership'));
        }
    }

    // save data to database (name = partnership.store)
    public function store(Request $request, $id)
    {
        //melakukan validasi dari inputan
        $messages = [
            'nama.required' => 'Kolom Nama Wajib Diisi.',
            'email.required' => 'Kolom Email Wajib Diisi.',
            'email.email' => 'Format Email Tidak Valid.',
            'universitas.required' => 'Kolom Universitas Wajib Diisi.',
            'telpon.required' => 'Kolom Telpon Wajib Diisi.',
            'deskripsi.required' => 'Kolom Deskripsi Wajib Diisi.',
            'proposal.required' => 'Proposal Wajib Diisi.',
            'proposal.mimes' => 'Format Proposal Harus Berupa PDF.',
        ];
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'universitas' => 'required|string|max:255',
            'telpon' => 'required|string|max:20',
            'deskripsi' => 'required|string',
            'proposal' => 'required|mimes:pdf',
        ], $messages);
        // variabel mahasiswa untuk menemukan user yang sedang login
        $mahasiswa = Auth::user();

        // Membuat objek Partnership dan mengisi kolom-kolomnya
        //deklarasi variabel partnership menimpan model Partnership
        $partnership = new Partnership;
        //input data ke database
        $partnership->nama = $request->input('nama');
        $partnership->email = $request->input('email');
        $partnership->universitas = $request->input('universitas');
        $partnership->telpon = $request->input('telpon');
        $partnership->deskripsi = $request->input('deskripsi');
        $partnership->proposal = $request->file('proposal')->store('proposal');
        $partnership->status = "pending";
        $partnership->mahasiswa_id = $mahasiswa->id;
        $partnerships = User::find($id);
        $partnership->sponsor_id = $partnerships->id;

        // Menyimpan data ke tabel partnerships
        $partnership->save();

        return redirect()->route('partnership.mahasiswa-page', ['id' => $partnerships->id])->with('success', 'Permintaan kerja sama berhasil dikirim.');
    }

    // update status partnership (name = sponsor.update, role sponsor)
    public function update($id)
    {
        // variabel user untuk menemukan user yang sedang login
        $user = Auth::user();
        // Temukan entitas "partnership" berdasarkan ID dan ID sponsor yang sedang login 
        $partnership = Partnership::where('mahasiswa_id', $id)->where('sponsor_id', $user->id)->first();
        // Periksa apakah entri ditemukan
        if ($partnership) {
            // Periksa apakah status partnership adalah "pending"
            $newStatus = request('sponsor_status'); // Mengambil nilai "accepted" atau "rejected" dari formulir.
            $partnership->status = $newStatus;
            // Simpan perubahan ke database
            $partnership->update();
            // Redirect pengguna ke halaman yang sesuai setelah update berhasil
            return redirect()->route('sponsor.mahasiswa')->with('success', 'Status sponsor berhasil diperbarui.');
            // Jika entri tidak ditemukan, hasilkan respons kode status 404 (Not Found)
        } else {
            // Jika entri tidak ditemukan, hasilkan respons kode status 404 (Not Found)
            return redirect()->route('sponsor.mahasiswa')->with('error', 'Tidak dapat menemukan data partnership dengan ID yang sesuai.');
        }
    }

    // upload MOU (name = sponsor.upload, role sponsor)
    public function uploadMou(Request $request, $id)
    {
        // variabel user untuk menemukan user yang sedang login
        $user = Auth::user();
        // Validasi data yang diinputkan, jika diperlukan
        $request->validate([
            'mou' => 'required|mimes:pdf',
        ], [
            'mou.required' => 'Kolom MOU wajib diisi.',
            'mou.mimes' => 'File yang diunggah harus berformat PDF.',
        ]);
        // Temukan entitas "partnership" berdasarkan ID
        if (Auth::check() && $user->role == 'sponsor') {
            $partnership = Partnership::where('mahasiswa_id', $id)->where('sponsor_id', $user->id)->first();
            if (!$partnership) {
                return redirect()->route('sponsor.mahasiswa')->with('error', 'Tidak dapat menemukan data partnership dengan ID yang sesuai.');
            }
            // Jika validasi berhasil, simpan file PDF ke kolom "mou"
            if ($request->hasFile('mou') && $request->file('mou')->guessExtension() == 'pdf') {
                $partnership->pengirim = 'sponsor';
                $partnership->mou = $request->file('mou')->store('mou');
                $partnership->save();
                return redirect()->route('sponsor.mahasiswa')->with('success', 'File MOU berhasil diperbarui.');
            } else {
                return redirect()->route('sponsor.mahasiswa')->with('error', 'File yang diunggah bukan berformat PDF.');
            }
        } else if (Auth::check() && $user->role == 'mahasiswa') {
            $detail = User::find($id);
            $account = Auth::user();
            // dd($id);
            $partnership = Partnership::where('mahasiswa_id', $account->id)->where('sponsor_id', $detail->id)->first();
            if (!$partnership) {
                return redirect()->route('partnership.mahasiswa-page', ['id' => $detail->id])->with('error', 'Tidak dapat menemukan data partnership dengan ID yang sesuai.');
            }
            // Jika validasi berhasil, simpan file PDF ke kolom "mou"
            if ($request->hasFile('mou') && $request->file('mou')->guessExtension() == 'pdf') {
                $partnership->pengirim = 'mahasiswa';
                $partnership->mou = $request->file('mou')->store('mou');
                $partnership->save();
                // Redirect pengguna ke halaman yang sesuai setelah upload berhasil

                // dd($partnership);
                $idSponsor = $partnership->sponsor_id;
                // dd($detail);
                $a = Profile::where('user_id', $idSponsor)->first()->id;


                return redirect()->route('partnership.mahasiswa-page', ['id' => $detail->id])->with('success', 'MOU berhasil diunggah.');
                // return redirect()->route('partnership.mahasiswa-page', ['id' => $partnerid->id])->with('success', 'File MOU berhasil diperbarui.');
            } else {
                return redirect()->route('partnership.mahasiswa-page', ['id' => $detail->id])->with('error', 'File yang diunggah bukan berformat PDF.');
            }
        }
    }

    // download MOU (name = sponsor.download, role mahasiswa)
    public function downloadPdf($id)
    {
        $partnership = Partnership::where('sponsor_id', $id)->where('mahasiswa_id', User::auth()->id)->first();

        // $partnership = Partnership::where('sponsor_id', $id)->where('mahasiswa_id', User::auth()->id)->first();

        // Periksa apakah entri ditemukan
        if (!$partnership) {
            dd($partnership);
            return abort(404); // Entri tidak ditemukan, hasilkan respons kode status 404 (Not Found)
        }

        $pdfFilename = $partnership->mou;
        $filePath = 'public/' . str_replace(['/', '\\'], '/', $pdfFilename);

        if (Storage::disk('local')->exists('public/' . $pdfFilename)) {
            $pdfContents = Storage::disk('local')->get($filePath);
            // Return a response with the PDF content
            return response($pdfContents)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename=' . $pdfFilename);
        } else {
            // File PDF tidak ditemukan, berikan respons kesalahan
            return abort(404);
        }
    }

    //LPJ
    public function uploadBukti(Request $request, $id)
    {

        $request->validate([
            'lpj' => 'required|mimes:pdf',
        ]);

        $detail = User::find($id);
        $user = Auth::user();
        $partnership = Partnership::where('mahasiswa_id', $user->id)->where('sponsor_id', $detail->id)->first();

        if ($request->hasFile('lpj')) {
            $photoBuktiPath = $request->file('lpj')->store('lpj');
            $partnership['lpj'] = $photoBuktiPath;
            $partnership->save();
        }
        return redirect()->route('partnership.mahasiswa-page', ['id' => $detail->id])->with('success', 'Bukti LPJ berhasil diunggah.');
    }
}
