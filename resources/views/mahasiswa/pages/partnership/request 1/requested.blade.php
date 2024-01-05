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
        <!-- nama sponsor -->
        <h1 class="font-medium text-3xl">{{$partnership->sponsor->name}}</h1>
        <!-- end nama sponsor -->
        <!-- status -->
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
        <!-- end status -->
    </div>
    <!-- deskripsi -->
    <p class="text-gray-600 mt-6">{{$partnership->deskripsi}}</p>
    <!-- end deskripsi -->
    @csrf
    <div class=" mt-8 grid lg:grid-cols-2 gap-4">
        @if(Auth::check())
        <!-- nama partnership -->
        <div>
            <label for="name" class="text-label-form"> Nama</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->nama ?? '-' }}</p>
        </div>
        <div>
            <label for="email" class="text-label-form">Email</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->email ?? '-' }}</p>
        </div>
        <div>
            <label for="job" class="text-label-form">Universitas</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->universitas ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-label-form">Nomor Telpon</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->telpon ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-label-form">Deskripsi</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->deskripsi ?? '-' }}</p>
        </div>

        @endif
    </div>
    <!-- </form> -->
</div>
</div>
@endsection