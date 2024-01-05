@extends('mahasiswa.layout.basetemplate')
@section('content')

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

<!-- contact -->
<section class="w-full h-full sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-header">Kontak Kami</h2>
            <p class="text-child">Hubungi kami jika terdapat keluhan atau masukkan. Kami akan menerima dengan senang hati.</p>
        </div>


        <div class="max-w-5xl mx-auto mt-12 sm:mt-16">
            <div class="grid grid-cols-1 gap-6 text-center md:px-0 md:grid-cols-3 ">
                <div class="overflow-hidden bg-white rounded-tl-3xl hover-shadow">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M3 5.5C3 14.0604 9.93959 21 18.5 21C18.8862 21 19.2691 20.9859 19.6483 20.9581C20.0834 20.9262 20.3009 20.9103 20.499 20.7963C20.663 20.7019 20.8185 20.5345 20.9007 20.364C21 20.1582 21 19.9181 21 19.438V16.6207C21 16.2169 21 16.015 20.9335 15.842C20.8749 15.6891 20.7795 15.553 20.6559 15.4456C20.516 15.324 20.3262 15.255 19.9468 15.117L16.74 13.9509C16.2985 13.7904 16.0777 13.7101 15.8683 13.7237C15.6836 13.7357 15.5059 13.7988 15.3549 13.9058C15.1837 14.0271 15.0629 14.2285 14.8212 14.6314L14 16C11.3501 14.7999 9.2019 12.6489 8 10L9.36863 9.17882C9.77145 8.93713 9.97286 8.81628 10.0942 8.64506C10.2012 8.49408 10.2643 8.31637 10.2763 8.1317C10.2899 7.92227 10.2096 7.70153 10.0491 7.26005L8.88299 4.05321C8.745 3.67376 8.67601 3.48403 8.55442 3.3441C8.44701 3.22049 8.31089 3.12515 8.15802 3.06645C7.98496 3 7.78308 3 7.37932 3H4.56201C4.08188 3 3.84181 3 3.63598 3.09925C3.4655 3.18146 3.29814 3.33701 3.2037 3.50103C3.08968 3.69907 3.07375 3.91662 3.04189 4.35173C3.01413 4.73086 3 5.11378 3 5.5Z" stroke="#a1a1a1" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <p class="mt-8 text-lg font-semibold text-gray-900">+62-822-2048-4108</p>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-tl-3xl hover-shadow">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#a1a1a1">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M21 8L17.4392 9.97822C15.454 11.0811 14.4614 11.6326 13.4102 11.8488C12.4798 12.0401 11.5202 12.0401 10.5898 11.8488C9.53864 11.6326 8.54603 11.0811 6.5608 9.97822L3 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z" stroke="#a1a1a1" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <p class="mt-8 text-lg font-semibold text-gray-900">singgihbudi.sbh@gmail.com</p>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-tl-3xl hover-shadow">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#a1a1a1" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#a1a1a1" stroke-width="0.9600000000000002" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <p class="mt-8 text-lg font-semibold leading-relaxed text-gray-900"> Banjarkerta, Karanganyar, Indonesia</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 overflow-hidden bg-white hover-shadow rounded-tl-3xl">
                <div class="px-6 py-12 sm:p-12">
                    <h3 class="text-3xl font-semibold text-center text-gray-900">Kirim Kami Pesan</h3>

                    <form action="{{ secure_url('message') }}" method="POST" class="mt-14">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4 px-10">
                            <div>
                                <label for="" class="text-base font-medium text-gray-900 "> Nama Lengkap </label>
                                <div class="mt-2.5 relative ">
                                    <input type="text" name="nama" id="" value="{{ auth()->user()->name }}" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                                @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Email </label>
                                <div class="mt-2.5 relative">
                                    <input type="email" name="email" id="" value="{{ auth()->user()->email }}" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="" class="text-base font-medium text-gray-900"> Pesan </label>
                                <div class="mt-2.5 relative">
                                    <textarea name="pesan" id="" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md resize-y focus:outline-none focus:border-blue-600 caret-blue-600" rows="4"></textarea>
                                </div>
                                @error('pesan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2 bg-gradient-to-r from-fuchsia-600 to-blue-600 hover:bg-gradient-to-r hover:from-blue-600 hover:to-fuchsia-600 rounded-md">
                                <button type="submit" class="btn-primary w-full">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact -->
</section>
<!-- Section: Design Block -->
</div>
</div>
<!-- Container for demo purpose -->
@endsection