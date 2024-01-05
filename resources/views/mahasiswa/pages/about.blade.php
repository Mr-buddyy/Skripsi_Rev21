@extends('mahasiswa.layout.basetemplate')
@section('content')
<div class="w-full h-full sm:py-16 lg:py-24">
    <!-- Common hero -->
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-content mx-auto max-w-[768px] text-center">
                <p class="text-header">Tentang Kami</p>
                <p>
                    Sect adalah suatu website yang digunakan untuk mempertemukan mahasiswa penyelenggara event dengan sponsor untuk menjalin kerja sama. Dalam website ini pihak sponsor dapat menawarkan suatu benefit kepada mahasiswa sesuai dengan kriteria yang diinginkan. Disisi lain mahasiswa dapat mengajukan kerja sama dengan sponsor. Mahasiswa hanya dapat mendaftar jika mahasiswa memenuhi kriteria yang telah ditentukan oleh pihak sponsor. Hal itu untuk meminimalisir ditolaknya kerja sama dan efisiensi waktu.
                </p>
                <div class="flex flex-row justify-center">
                    <a class="mt-10 animate-bounce text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-14 h-14 shadow-lg rounded-full bg-white" href="#about2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="#000000" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- <div class="counter mt-16 max-w-[1240px] mx-auto px-4">
                <div class="flex flex-col lg:flex-row mx-0 rounded-[20px] bg-white px-10 shadow-lg lg:py-5 justify-between">
                    <div class="border-border p-10 text-center sm:w-1/2 lg:w-1/4 lg:border-r">
                        <h2>
                            <span class="count">25M</span> <span class="text-[#A3A1FB]">+</span>
                        </h2>
                        <p>Customers</p>
                    </div>
                    <div class="border-border p-10 text-center sm:w-1/2 lg:w-1/4 lg:border-r">
                        <h2>
                            <span class="count">440M</span> <span class="text-[#5EE2A0]">+</span>
                        </h2>
                        <p>Products sold</p>
                    </div>
                    <div class="border-border p-10 text-center sm:w-1/2 lg:w-1/4 lg:border-r">
                        <h2>
                            <span class="count">50K</span> <span class="text-primary">+</span>
                        </h2>
                        <p>Online stores</p>
                    </div>
                    <div class="border-border p-10 text-center sm:w-1/2 lg:w-1/4">
                        <h2>
                            <span class="count">20K</span> <span class="text-[#FEC163]">+</span>
                        </h2>
                        <p>Transactions</p>
                    </div>
                </div>
            </div> -->

        </div>
    </section>
    <!-- end Common hero -->

    <section id="about2" class="py-10 sm:py-16 lg:py-24">
        <!-- apa yang bisa kita lakukan -->
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
    </section>

    <!-- ./end Works -->
    <!-- <div class=" selection:text-[#F7981D] py-10">
        <div class="flex gap-2 mx-auto my-11 px-4 max-w-[1240px]">
            <div class="mx-5 flex gap-2 justify-between items-center">
                <div class="text-justify ">
                    <div class="text-[40px] font-bold">
                        PLATFORM <br /> MANAGEMENT <br />
                        EVENT
                    </div>
                    <div class="text-[20px]">
                        Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Integer quis dictum dolor.
                    </div>
                </div>
            </div>
            <div>
                <img src="./assets/img/about/about1.png" alt="" />
            </div>
        </div>
    </div> -->


</div>
@endsection