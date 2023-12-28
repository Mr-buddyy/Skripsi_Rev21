@extends('mahasiswa.layout.basetemplate')
@section('content')
<main>
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

    <!-- hero -->
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- left -->
                <div>
                    <h1 class="text-hero">
                        Platform Management Event &
                        <div class="relative inline-flex">
                            <span class="absolute inset-x-0 bottom-0 border-b-[30px] border-[#4ADE80]"></span>
                            <h1 class="relative text-hero">Sponsorship
                            </h1>
                        </div>
                    </h1>
                    <p class="text-child"> Temukan Sponsor dan Jalin kerja sama untuk Eventmu dengan website kami.</p>
                    <div class="mt-10 sm:flex sm:items-center sm:space-x-8">
                        <a href="#about" title="" class="hover-shadow btn-primary px-10 py-4" role="button"> Mulai Jelajah </a>
                        <!-- <a href="#" title="" class="inline-flex items-center mt-6 text-base font-semibold transition-all duration-200 sm:mt-0 hover:opacity-80">
                            <svg class="w-10 h-10 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path fill="#F97316" stroke="#F97316" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Watch video
                        </a> -->
                    </div>
                </div>
                <!-- end left -->

                <!-- image rigt -->
                <div class="pr-12 sm:pr-0">
                    <div class="relative max-w-xs mb-12 ">
                        <img class="hover-shadow object-bottom rounded-md max-w-full" src="{{asset('assets/img/hero3.png')}}" alt="" />
                        <img class="hover-shadow absolute origin-bottom-right scale-75 rounded-md -bottom-12 -right-44 max-w-full" src="{{asset('assets/img/hero2.png')}}" alt="" />
                    </div>
                </div>
                <!-- <div>
                    <img class="w-full rounded-lg" src="{{asset('assets/img/hero.jpg')}}" alt="" />
                </div> -->
                <!-- end image right -->
            </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- who we are? -->
    <section id="about" class="py-10 bg-white sm:py-16 lg:py-24">
        <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="grid items-center md:grid-cols-2 gap-y-10 md:gap-x-20">
                <!-- left image -->
                <div class="pr-12 sm:pr-0">
                    <div class="relative max-w-xs mb-12">
                        <img class="object-bottom rounded-md max-w-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/4/man-eating-noodles.jpg" alt="" />
                        <img class="absolute origin-bottom-right scale-75 rounded-md -bottom-12 -right-12 max-w-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/4/smiling-businessman.jpg" alt="" />
                    </div>
                </div>
                <!-- end left image -->

                <!-- right -->
                <div>
                    <h2 class="text-header">Siapa Kita ?</h2>
                    <p class="text-child ">Sect adalah suatu website yang digunakan untuk mempertemukan mahasiswa penyelenggara event dengan sponsor untuk menjalin kerja sama. Dalam website ini pihak sponsor dapat menawarkan suatu benefit kepada mahasiswa sesuai dengan kriteria yang diinginkan. Disisi lain mahasiswa dapat mengajukan kerja sama dengan sponsor. Mahasiswa hanya dapat mendaftar jika mahasiswa memenuhi kriteria yang telah ditentukan oleh pihak sponsor. Hal itu untuk meminimalisir ditolaknya kerja sama dan efisiensi waktu.</p>
                </div>
                <!-- end right -->
            </div>
        </div>
    </section>
    <!-- end siapa kita ? -->

    <!-- apa yang bisa kita lakukan -->
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- head -->
            <div class="max-w-xl mx-auto text-center">
                <h2 class="mt-6 text-header">Apa yang bisa kita lakukan ?</h2>
                <!-- <p class="mt-4 text-base leading-relaxed text-gray-600">Amet minim mollit non deserunt ullamco est sit
                    aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p> -->
            </div>
            <!-- end head -->
            <div class="grid grid-cols-1 gap-5 mt-12 sm:grid-cols-3 lg:mt-20 lg:gap-x-12">
                <!-- card 1 -->
                <div class="hover-shadow bg-white rounded-tl-3xl">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16" viewBox="0 0 146 146" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>001-business</title>
                                <rect x="0.5" y="0.5" width="145" height="145" fill="none"></rect>
                                <path d="M40.33,79a4.26,4.26,0,0,1,.62,5.94l-0.38.45-1.74,2a4.25,4.25,0,0,1-5.93.37l-0.07-.06-0.1-.08a4.26,4.26,0,0,1-.62-5.93l1.62-1.9,0.5-.58a4.26,4.26,0,0,1,5.94-.36l0.07,0.06Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M48.33,85a5.39,5.39,0,0,1,0,7.86L45.68,96a5.15,5.15,0,0,1-7.15.67l-0.1-.08-0.1-.09a5.15,5.15,0,0,1-.52-7.19l2.64-3.1a6.11,6.11,0,0,1,.43-0.56A5.39,5.39,0,0,1,48.33,85Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M56.33,93a5,5,0,0,1,.72,6.93l-2.46,2.9a5,5,0,0,1-6.93.43l-0.09-.07-0.11-.1a5,5,0,0,1-.71-6.93L49,93.48l0.22-.26a5,5,0,0,1,6.94-.42l0.09,0.07Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M64.61,99.55a4.61,4.61,0,0,1,.66,6.41L63,108.64a4.59,4.59,0,0,1-6.41.39L56.5,109l-0.1-.09a4.6,4.6,0,0,1-.66-6.41l1.82-2.15L58,99.79a4.6,4.6,0,0,1,6.42-.39l0.08,0.07Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <polygon points="113.26 75.47 104.41 52.35 102.73 47.97 127.13 38.64 127.13 77.45 115.8 82.1 113.26 75.47" fill="#ffffff"></polygon>
                                <path d="M56.19,55.79l4-5a1.58,1.58,0,0,1,.9-0.57l13.5-2.82a8,8,0,0,1,5.9.07l16.67,7.17,6-1.78,1.27-.49,8.86,23.12-4.93,3-1.6,5.6L88.07,73.64l0.06-.3a14.38,14.38,0,0,1-5.4-2.3,15.12,15.12,0,0,1-6-9.6h-10a11.36,11.36,0,0,1-17.2,2.8Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M76.54,104.17l-0.13.25a6.6,6.6,0,0,1-.88,5.82l0,0.06a5.24,5.24,0,0,1-6.57,1.38c-2.07-1.06-2.86-1.43-5.92-3L65.28,106a4.61,4.61,0,0,0-.66-6.41l-0.1-.08-0.08-.07a4.6,4.6,0,0,0-6.42.39l-0.46.54-0.51-.43A5,5,0,0,0,56.33,93l-0.1-.09-0.09-.07a5,5,0,0,0-6.94.42L49,93.48l-0.69-.58a5.21,5.21,0,1,0-7.43-7.25l-0.31-.26,0.38-.45A4.26,4.26,0,0,0,40.33,79l-0.09-.07-0.07-.06a4.26,4.26,0,0,0-5.94.36l-0.5.58-0.6-.5-6.47-.86,8.5-26.5,5.42,1.71,15.61,0.54-6.66,10a11.36,11.36,0,0,0,17.2-2.8h10a15.12,15.12,0,0,0,6,9.6,14.38,14.38,0,0,0,5.4,2.3l-0.06.3L106.73,84.1a5.61,5.61,0,0,1-4.52,10.26l-2.77-1.44a6.78,6.78,0,0,1-.71,5.71l0,0.07a5.28,5.28,0,0,1-6.82,1.62L89,98.84l-0.22.43a7.74,7.74,0,0,1-1.23,6.17l0,0a4.85,4.85,0,0,1-6.06,1.23Z" fill="#ffffff" stroke="#ffffff" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <polygon points="35.16 50.33 28.26 73.64 24.93 84.1 15.02 80.67 15.02 39.32 36.33 46.64 35.16 50.33" fill="#ffffff"></polygon>
                                <path d="M99.45,92.92l-9-4.68" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M88.07,73.64L106.73,84.1a5.61,5.61,0,0,1-4.52,10.26l-2.77-1.44" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M99.45,92.92h0a6.78,6.78,0,0,1-.71,5.71l0,0.07a5.28,5.28,0,0,1-6.82,1.62L89,98.84l-6.52-3.4" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M88.77,99.27a7.74,7.74,0,0,1-1.23,6.17l0,0a4.85,4.85,0,0,1-6.06,1.23l-4.89-2.54-4.47-2.34" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <polyline points="57.13 54.33 39.78 52.84 34.39 50.98" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></polyline>
                                <polyline points="112.73 75.3 112.46 75.47 107.53 78.5 105.93 84.1" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></polyline>
                                <path d="M91.12,73.64a12.34,12.34,0,0,1-3-.3,13.35,13.35,0,0,1-5.4-2.7c-1-.8-4.92-3.86-6-8.87,0-.14-0.05-0.26-0.06-0.33h-10a11.36,11.36,0,0,1-17.2,2.8l6.66-8.45,4-5a1.58,1.58,0,0,1,.9-0.57l13.5-2.82a8,8,0,0,1,5.9.07l16.67,7.17,6-1.78" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.38"></path>
                                <line x1="33.13" y1="79.3" x2="28.26" y2="77.64" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <path d="M40.57,85.38l-1.74,2a4.25,4.25,0,0,1-5.93.37l-0.07-.06-0.1-.08a4.26,4.26,0,0,1-.62-5.93l1.62-1.9,0.5-.58a4.26,4.26,0,0,1,5.94-.36l0.07,0.06L40.33,79a4.26,4.26,0,0,1,.62,5.94Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M48.31,92.89L45.68,96a5.15,5.15,0,0,1-7.15.67l-0.1-.08-0.1-.09a5.15,5.15,0,0,1-.52-7.19l2.64-3.1a6.11,6.11,0,0,1,.43-0.56A5.21,5.21,0,1,1,48.31,92.89Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M57.05,99.89l-2.46,2.9a5,5,0,0,1-6.93.43l-0.09-.07-0.11-.1a5,5,0,0,1-.71-6.93L49,93.48l0.22-.26a5,5,0,0,1,6.94-.42l0.09,0.07L56.33,93A5,5,0,0,1,57.05,99.89Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M63,108.64a4.59,4.59,0,0,1-6.41.39L56.5,109l-0.1-.09a4.6,4.6,0,0,1-.66-6.41l1.82-2.15L58,99.79a4.6,4.6,0,0,1,6.42-.39l0.08,0.07,0.1,0.08a4.61,4.61,0,0,1,.66,6.41Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M76.41,104.42a6.6,6.6,0,0,1-.88,5.82l0,0.06a5.24,5.24,0,0,1-6.57,1.38c-2.07-1.06-2.86-1.43-5.92-3" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <polygon points="35.11 50.49 35.16 50.33 36.33 46.64 15.02 39.32 14.97 45.18 35.11 50.49" fill="#ffffff"></polygon>
                                <path d="M15,39.32l20.57,7.06a0.8,0.8,0,0,1,.5,1L25.18,83.33a0.8,0.8,0,0,1-1,.52L15,80.67" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <polygon points="102.17 47.97 103.22 53.06 126 42.64 126 38.64 102.17 47.97" fill="#ffffff"></polygon>
                                <path d="M127.13,77.45l-10.6,4.38a0.8,0.8,0,0,1-1-.47L103,48.73a0.8,0.8,0,0,1,.48-1l23.63-9.06" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.38"></path>
                                <circle cx="138.73" cy="81.02" r="2" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></circle>
                                <circle cx="125.53" cy="89.84" r="1.6" fill="#ffffff"></circle>
                                <line x1="135.4" y1="96.1" x2="138.6" y2="99.3" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="138.6" y1="96.1" x2="135.4" y2="99.3" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <path d="M12.77,18.2L15.1,17a0.08,0.08,0,0,1,.12.08l-0.44,2.59,2,1.95L14,22l-1.24,2.5L11.54,22l-2.6-.38a0.08,0.08,0,0,1,0-.14l1.88-1.84L10.3,16.9Z" fill="#ffffff"></path>
                                <circle cx="23.36" cy="28.64" r="2" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></circle>
                                <circle cx="6.07" cy="32.24" r="1.6" fill="#ffffff"></circle>
                                <line x1="75" y1="122" x2="75" y2="128" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="78" y1="125" x2="72" y2="125" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <circle cx="61.47" cy="121.04" r="1.6" fill="#ffffff"></circle>
                            </g>
                        </svg>
                        <h3 class="mt-8 text-lg font-semibold text-black">Menjalin kerja sama</h3>
                        <p class="mt-4 text-base text-gray-600">Dengan website ini anda dapat menjalin kerja sama dengan pihak sponsor dengan mudah.</p>
                    </div>
                </div>
                <!-- end card 1 -->

                <!-- card 2 -->
                <div class="hover-shadow bg-white rounded-tl-3xl">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16" viewBox="0 0 146 146" xmlns="http://www.w3.org/2000/svg" fill="#ffff" stroke="#ffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>001-business</title>
                                <rect x="0.5" y="0.5" width="145" height="145" fill="none"></rect>
                                <path d="M122.55,114.72L115.65,127a0.8,0.8,0,0,1-1.39,0l-6.9-12.27v-0.66h15.2v0.66Z" fill="#a1a1a1ffffff"></path>
                                <rect x="107.35" y="34.86" width="15.2" height="9.6" fill="#a1a1a1ffffff"></rect>
                                <path d="M122.55,26.46v8.4h-15.2v-8.4a3.2,3.2,0,0,1,3.2-3.2h8.8A3.2,3.2,0,0,1,122.55,26.46Z" fill="#a1a1a1ffffff"></path>
                                <rect x="107.35" y="44.46" width="15.2" height="69.6" fill="#a1a1a1ffffff"></rect>
                                <path d="M94.15,50.46h-26a0.8,0.8,0,0,1-.8-0.8v-26Z" fill="#a1a1a1ffffff"></path>
                                <path d="M94.55,51.19v71.27a4.8,4.8,0,0,1-4.8,4.8h-68a4.8,4.8,0,0,1-4.8-4.8V28.06a4.8,4.8,0,0,1,4.8-4.8H66.63a0.81,0.81,0,0,1,.56.23l0.17,0.17v26a0.8,0.8,0,0,0,.8.8h26l0.17,0.17A0.81,0.81,0,0,1,94.55,51.19ZM49,66.06a10.8,10.8,0,1,0-10.8,10.8A10.8,10.8,0,0,0,49,66.06Zm0,36.8a10.8,10.8,0,1,0-10.8,10.8A10.8,10.8,0,0,0,49,102.86Z" fill="#a1a1a1ffffff"></path>
                                <path d="M38.15,53.26A12.8,12.8,0,1,0,51,66.06,12.81,12.81,0,0,0,38.15,53.26Z" fill="#a1a1a1ffffff"></path>
                                <path d="M38.15,90.06A12.8,12.8,0,1,0,51,102.86,12.81,12.81,0,0,0,38.15,90.06Z" fill="#a1a1a1ffffff"></path>
                                <line x1="57.35" y1="62.46" x2="77.35" y2="62.46" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="57.35" y1="70.46" x2="82.95" y2="70.46" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="57.35" y1="98.46" x2="77.35" y2="98.46" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="57.35" y1="106.46" x2="84.55" y2="106.46" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <polyline points="33.35 66.06 37.35 70.06 42.95 63.66" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.38"></polyline>
                                <polyline points="33.35 102.86 37.35 106.86 42.95 100.46" fill="none" stroke="#a1a1a1" stroke-linecap="round" stroke-linejoin="round" stroke-width="4.38"></polyline>
                                <rect x="119" y="44" width="4" height="70" fill="#a1a1a1eeb8a9"></rect>
                                <rect x="119" y="35" width="4" height="9" fill="#a1a1a1eeb8a9"></rect>
                                <line x1="122.55" y1="44.46" x2="107.35" y2="44.46" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <path d="M119.35,23h-4A3.84,3.84,0,0,1,119,26.46V35h4V26.46A3.84,3.84,0,0,0,119.35,23Z" fill="#a1a1a1eeb8a9"></path>
                                <path d="M122.55,114.06v0.66L115.65,127a0.8,0.8,0,0,1-1.39,0l-6.9-12.27V26.46a3.2,3.2,0,0,1,3.2-3.2h8.8a3.2,3.2,0,0,1,3.2,3.2v87.6Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <line x1="107.35" y1="34.86" x2="122.55" y2="34.86" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="122.55" y1="114.06" x2="107.35" y2="114.06" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <path d="M94.15,52a1.11,1.11,0,0,0,0-.69l0-.3h-26C67.71,51,67,50.9,67,50.46v4c0,0.44.71,0.54,1.15,0.54h26l0,0.3" fill="#a1a1a1c3c7cd"></path>
                                <path d="M94.15,50.46h-26a0.8,0.8,0,0,1-.8-0.8v-26" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <path d="M67.35,23.66l-0.17-.17a0.81,0.81,0,0,0-.56-0.23H21.75a4.8,4.8,0,0,0-4.8,4.8v94.4a4.8,4.8,0,0,0,4.8,4.8h68a4.8,4.8,0,0,0,4.8-4.8V51.19a0.81,0.81,0,0,0-.23-0.56l-0.17-.17Z" fill="none" stroke="#a1a1a1" stroke-miterlimit="10" stroke-width="4.38"></path>
                                <line x1="123.62" y1="8.32" x2="126.82" y2="11.52" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="126.82" y1="8.32" x2="123.62" y2="11.52" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <circle cx="139.95" cy="15.53" r="2" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></circle>
                                <circle cx="132.55" cy="25.79" r="1.6" fill="#a1a1a1ffffff"></circle>
                                <line x1="133" y1="127" x2="133" y2="133" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <line x1="136" y1="130" x2="130" y2="130" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></line>
                                <path d="M7.15,16.22L9.48,15a0.08,0.08,0,0,1,.12.08L9.15,17.67l2,1.95L8.39,20l-1.24,2.5L5.92,20l-2.6-.38a0.08,0.08,0,0,1,0-.14l1.88-1.84L4.68,14.92Z" fill="#a1a1a1ffffff"></path>
                                <circle cx="16.55" cy="9.92" r="1.6" fill="#a1a1a1ffffff"></circle>
                                <circle cx="122.55" cy="136.88" r="1.6" fill="#a1a1a1ffffff"></circle>
                                <circle cx="7.55" cy="29.26" r="2" fill="none" stroke="#a1a1a1ffffff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="4.38"></circle>
                            </g>
                        </svg>

                        <h3 class="mt-8 text-lg font-semibold text-black">Dokumentasi kerja sama</h3>
                        <p class="mt-4 text-base text-gray-600">Kerja sama akan terdokumentasi, baik yang diterima maupun yang ditolak.</p>
                    </div>
                </div>
                <!-- end card 2 -->

                <!-- card 3 -->
                <div class="hover-shadow bg-white rounded-tl-3xl">
                    <div class="py-10 px-9">
                        <svg class="w-16 h-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h3 class="mt-8 text-lg font-semibold text-black">Data akan disimpan dengan aman</h3>
                        <p class="mt-4 text-base text-gray-600">Data yang user berikan akan kami jaga kerahasiaanya </p>
                    </div>
                </div>
                <!-- end card 3 -->
            </div>
        </div>
    </section>
    <!-- end apa yang bisa kita lakukan -->

    <!-- sponsor -->
    <section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex items-end justify-between">
                <div class="text-left sm:text-center">
                    <h2 class="text-header">Cari Sponsorship
                    </h2>
                    <p class="text-child">Temukan Sponsor yang cocok untuk event mu</p>
                </div>
                <div class="gallery-controls hidden lg:flex lg:items-center lg:space-x-3">
                    <a href="sponsor" class="text-child transition-all duration-200 hover:text-blue-600 ">Lihat selengkapnya</a>
                </div>
            </div>
            @php
            $counter = 0;
            @endphp

            <div class="gallery-container grid max-w-md grid-cols-1 gap-6 mx-auto mt-8 lg:mt-16 lg:grid-cols-3 lg:max-w-full">
                @foreach($photos as $photo)
                @if ($photo && $photo->profile && $photo->profile->photo_account && $photo->partnership->count() == 0)
                @if ($counter < 3) <div class="galery-itemoverflow-hidden bg-white rounded-tl-3xl shadow">
                    <div class="p-5 aspect-w-4 aspect-h-3">
                        <div class="relative ">
                            <a href="{{ route('details.show-page', ['id' => $photo->id]) }}" title="" class="block aspect-w-full h-full ">
                                <img class="object-cover w-full h-full rounded-tl-2xl" src="{{ asset('storage/' . $photo->profile->photo_account) }}" alt="" />
                            </a>
                        </div>
                        <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> {{$photo->profile->alamat}} </span>
                        <p class="mt-5 text-2xl font-semibold">
                            <a href="#" title="" class="text-black"> {{$photo->profile->nama_perusahaan}}
                            </a>
                        </p>
                        <p class="mt-4 text-base text-gray-600">{{$photo->profile->deskripsi}}</p>
                        <a href="{{ route('details.show-page', ['id' => $photo->id]) }}" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                            Detail Sponsor
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
            </div>
            @endif
            @php
            $counter++;
            @endphp
            @endif
            @endforeach
            <!-- end -->
        </div>

        <div class="flex items-center justify-center mt-8 space-x-3 lg:hidden">
            <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        </div>
    </section>
    <!-- end sponsor -->

    <!-- contact -->
    <section class="py-10 sm:py-16 lg:py-24">
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
                    <div id="contact" class="px-6 py-12 sm:p-12">
                        <h3 class="text-3xl font-semibold text-center text-gray-900">Kirim Kami Pesan</h3>

                        <form action="{{ route('message') }}" method="POST" class="mt-14">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4 px-10">
                                <div>
                                    <label for="" class="text-base font-medium text-gray-900 "> Nama Lengkap </label>
                                    <div class="mt-2.5 relative ">
                                        <input type="text" name="nama" id="" value="{{ auth()->user()->username }}" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600" />
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
</main>

<!-- end cards -->
@endsection