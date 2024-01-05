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

<div class="ease-soft-in-out max-w-[1240px] mx-auto relative transition-all duration-200 ">
    <nav class="absolute z-20 flex flex-wrap items-center justify-between w-full px-6 py-2  transition-all shadow-none duration-250 ease-soft-in lg:flex-nowrap lg:justify-start" navbar-profile navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-6 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 pl-2 pr-4 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="leading-normal text-sm">
                        <a class="opacity-50" href="javascript:;">Mahasiswa</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Profile</li>
                </ol>
                <h6 class="mb-2 ml-2 font-bold capitalize">Profile</h6>
            </nav>

        </div>
    </nav>

    <div class="w-full px-6 mx-auto">
        @if ($user->profile && $user->profile->photo_cover)
        <div class="relative flex items-center p-0 sm:mt-16 lg:mt-24 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('{{ asset('storage/' . Auth::user()->profile->photo_cover) }}'); background-position-y: 50%">
        </div>
        @else
        <div class="bg-color-system text-white justify-center relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"> No Pic Cover
        </div>
        @endif
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        @if($user->profile && !empty($user->profile->photo_account))
                        <img src="{{ asset('storage/' . $user->profile->photo_account) }}" alt="Foto Profil" class="h-18.5 w-18.5 rounded-xl">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000" class="w-full shadow-soft-sm rounded-xl">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                        </svg>
                        <!-- <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" /> -->
                        @endif

                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1">{{ auth()->user()->name}}</h5>
                        <!-- <p class="mb-0 font-semibold leading-normal text-sm">CEO / Co-Founder</p> -->
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                    <div class="relative right-0">
                        <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl">
                            <li class="z-30 flex-auto text-right">
                                <a class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out text-slate-700" nav-link href="/editprofil" role="tab" aria-selected="false">
                                    <svg class="text-slate-700" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(304.000000, 151.000000)">
                                                        <polygon class="fill-slate-800" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="fill-slate-800" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                        <path class="fill-slate-800" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ml-1">Edit Profil</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-1">
                <div class="relative flex flex-row h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    @if(Auth::check())
                    <div class="flex-auto p-8">
                        <h5 class="mb-5">Informasi Event</h5>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex flex-row justify-between px-4 pb-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Nama Event
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start">
                                    {{ empty($user->profile) ? '-' : $user->profile->nama_perusahaan}}
                                </div>
                            </li>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Deskripsi Event
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{ empty($user->profile) ? '-' : $user->profile->deskripsi}}
                                </div>
                            </li>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Nomor telpon
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{ empty($user->profile) ? '-' : $user->profile->telpon}}
                                </div>
                            </li>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Email
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{$user->email}}
                                </div>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Alamat
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{empty($user->profile) ? '-' : $user->profile->alamat}}
                                </div>
                            </li>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Kriteria Peserta
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{empty($user->profile) ? '-' : $user->profile->jumlah_peserta}} Partisipan
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-end p-8 md:justify-center">
                        <div class="h-1">
                            <a href="/chat">
                                <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> Lihat Pesan</button>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection