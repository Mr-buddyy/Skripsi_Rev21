@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')
@if(session('success') || session('error'))
<div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="flex flex-col justify-center bg-white p-16 rounded-md shadow-md">
        <div class="flex flex-row justify-center p-5">
            <svg class="w-48 h-48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <circle cx="12" cy="12" r="9" fill="#43A047" fill-opacity="0.24"></circle>
                    <path d="M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5" stroke="#43A047" stroke-width="1.2" stroke-linecap="round"></path>
                    <path d="M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667" stroke="#43A047" stroke-width="1.2" stroke-linecap="round"></path>
                </g>
            </svg>
        </div>
        <p class="text-bold text-2xl">
            @if(session('success'))
            {{ session('success') }}
            @elseif(session('error'))
            {{ session('error') }}
            @endif
        </p>
        <p id="countdown-text"></p>
        <button onclick="closeModal()" class="px-5 py-4 rounded-md bg-green-500 text-white">Tutup</button>
    </div>
</div>
<script>
    var countdown = 10; // waktu dalam detik

    // Fungsi untuk memperbarui waktu dan menutup modal
    function updateCountdownAndCloseModal() {
        var countdownText = document.getElementById('countdown-text');
        countdown--;

        // Update teks waktu di dalam modal
        countdownText.innerText = "Otomatis menutup dalam " + countdown + " detik";

        if (countdown <= 0) {
            closeModal();
        } else {
            // Panggil fungsi setelah 1 detik
            setTimeout(function() {
                updateCountdownAndCloseModal();
            }, 1000);
        }
    }

    // Fungsi untuk membuka modal
    function openModal() {
        var modal = document.getElementById('modal-success');
        modal.classList.remove('hidden');
        updateCountdownAndCloseModal(); // Memulai perhitungan waktu saat modal terbuka
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        var modal = document.getElementById('modal-success');
        modal.classList.add('opacity-0');
        // Tambahkan delay sebelum menyembunyikan modal
        setTimeout(function() {
            modal.classList.add('hidden');
            modal.classList.remove('opacity-0');
        }, 300);
    }

    // Panggil fungsi openModal ketika halaman dimuat
    window.onload = openModal;
</script>
@endif
<div class=" my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <h1 class="font-medium text-3xl">{{$partnership->sponsor->profile->nama_perusahaan}}</h1>
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
    </div>
    @if($partnership->mou != null && $partnership->pengirim == 'sponsor')
    <p class="text-gray-600 mt-6">Permintaan kerja sama anda telah diterima oleh pihak {{ $partnership->sponsor->profile->nama_perusahaan ?? '-' }}</p>
    <!-- <form method="POST" enctype="multipart/form-data"> -->
    @csrf
    <div class="flex flex-col mt-8 gap-4"> <!-- grid lg:grid-cols-2 -->
        @if(Auth::check())
        <div>
            <h1>PDF Viewer</h1>
            <embed src="data:application/pdf;base64,{{ base64_encode($pdfContents) }}" width="800" height="600" type="application/pdf">

        </div>
        <form action="{{ secure_url('sponsor.upload', ['id' => $detail->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-span-full">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Proposal</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <input type="file" class="form-control" name="mou">
                    <!-- <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button> -->
                </div>
            </div>

            <div class="space-x-4 mt-8">
                <div class="btn-primary">
                    <button type="submit" class="px-2">
                        Kirim
                    </button>
                </div>
                <button class="h-[3rem] w-[6rem] text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                    Cancel
                </button>
            </div>
        </form>
        @endif
    </div>
    @else
    <p class="text-gray-600 mt-6">Permintaan kerja sama anda telah diterima oleh pihak {{ $partnership->nama ?? '-' }}. Mohon tunggu untuk kelanjutannya</p>
    @endif

    <!-- </form> -->
</div>
</div>
@endsection