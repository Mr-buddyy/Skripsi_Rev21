@include('sponsor.layout.header')
@include('sponsor.layout.navbarside')
<div class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen transition-all duration-200">
    <nav class="absolute z-20 flex flex-wrap items-center justify-between w-full px-6 py-2 text-white transition-all shadow-none duration-250 ease-soft-in lg:flex-nowrap lg:justify-start" navbar-profile navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-6 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 pl-2 pr-4 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="leading-normal text-sm">
                        <a class="opacity-50" href="javascript:;">Pages</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:content-['/']" aria-current="page">Profile</li>
                </ol>
                <h6 class="mb-2 ml-2 font-bold text-white capitalize">Profile</h6>
            </nav>

        </div>
    </nav>

    <div class="w-full px-6 mx-auto">
        @if($user->profile && !empty($user->profile->photo_account))
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('{{ asset('storage/' . Auth::user()->profile->photo_cover) }}'); background-position-y: 50%">
        </div>
        @else
        <div class="bg-black text-white justify-center relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"> No Pic Cover
        </div>
        @endif
        <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        @if($user->profile && !empty($user->profile->photo_account))
                        <img src="{{ asset('storage/' . $user->profile->photo_account) }}" alt="Foto Profil" class="h-18.5 w-18.5 rounded-xl object-cover">
                        @else
                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
                        @endif

                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1">{{ auth()->user()->username}}</h5>
                        <p class="mb-0 font-semibold leading-normal text-sm">CEO / Co-Founder</p>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                    <div class="relative right-0">
                        <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl">
                            <li class="z-30 flex-auto text-right">
                                <a class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="/editprofil" role="tab" aria-selected="false">
                                    <svg class="" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-1/2">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">

                    <!-- <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                <h6 class="mb-0">Informasi Perusahaan</h6>
                            </div>
                            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                                <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                                    <i class="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
                                </a>
                                <div data-target="tooltip" class="hidden px-2 py-1 text-center text-white bg-black rounded-lg text-sm" role="tooltip">
                                    Edit Profile
                                    <div class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    @if(Auth::check())
                    <div class="flex-auto p-8">
                        <!-- <hr class="h-px bg-gradient-to-r from-transparent via-black to-transparent" /> -->
                        <h5 class="mb-5">Informasi Perusahaan</h5>
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex flex-row justify-between px-4 pb-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Nama Perusahaan
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start">
                                    {{ empty($user->profile) ? '-' : $user->profile->nama_perusahaan}}
                                </div>
                                <!-- <strong class="text-slate-700">Nama Perusahaan:</strong> &nbsp; {{ empty($user->profile) ? '-' : $user->profile->nama_perusahaan}} -->
                            </li>
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Deskripsi Perusahaan
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    <!-- {{ empty($user->profile) ? '-' : $user->profile->deskripsi}} -->
                                    {{ empty($user->profile) ? '-' : $user->profile->deskripsi}}
                                </div>
                            </li>
                            <!-- <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Deskripsi Perusahaan:</strong>
                            </li>
                            <p class="leading-normal text-sm">
                                {{ empty($user->profile) ? '-' : $user->profile->deskripsi}}
                            </p> -->
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Nomor telpon
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{ empty($user->profile) ? '-' : $user->profile->telpon}}
                                </div>
                            </li>
                            <!-- <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Nomor telpon:</strong> &nbsp; {{ empty($user->profile) ? '-' : $user->profile->telpon}}
                            </li> -->
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Email
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{$user->email}}
                                </div>
                                <!-- </li>
                            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Email:</strong> &nbsp; {{$user->email}}
                            </li> -->
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Alamat
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{empty($user->profile) ? '-' : $user->profile->alamat}}
                                </div>
                            </li>
                            <!-- <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Alamat:</strong> &nbsp; {{empty($user->profile) ? '-' : $user->profile->alamat}}
                            </li> -->
                            <li class="relative flex flex-row justify-between px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700 w-1/2 flex flex-row justify-start">
                                    Kriteria Peserta
                                </strong>
                                <div class="w-1/2 flex flex-row justify-start leading-normal">
                                    {{empty($user->profile) ? '-' : $user->profile->jumlah_peserta}} Partisipan
                                </div>
                            </li>
                            <!-- <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Kriteria Peserta:</strong> &nbsp; {{empty($user->profile) ? '-' : $user->profile->jumlah_peserta}} Partisipan
                            </li> -->
                        </ul>
                    </div>
                    @endif
                </div>
            </div>




            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-1/2">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-0">Conversations</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex flex-row justify-between items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit">
                                <div class="w-1/2 flex flex-row justify-start">
                                    asdasdasdasd
                                </div>
                                <div class="w-1/2 flex flex-row justify-start">
                                    sadasdasdf
                                </div>
                            </li>
                            <li class="w-full flex flex-row justify-between items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="w-1/2 flex flex-row justify-start">
                                    sadf
                                </div>
                                <div class="w-1/2 flex flex-row justify-start">
                                    sadf
                                </div>
                            </li>
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/ivana-square.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Ivanna</h6>
                                    <p class="mb-0 leading-tight text-xs">About files I can..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/team-4.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Peterson</h6>
                                    <p class="mb-0 leading-tight text-xs">Have a great afternoon..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/team-3.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Nick Daniel</h6>
                                    <p class="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <!-- <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-1/2">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-0">Conversations</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Sophie B.</h6>
                                    <p class="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/marie.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Anne Marie</h6>
                                    <p class="mb-0 leading-tight text-xs">Awesome work, can you..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/ivana-square.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Ivanna</h6>
                                    <p class="mb-0 leading-tight text-xs">About files I can..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 mb-2 bg-white border-0 border-t-0 text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/team-4.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Peterson</h6>
                                    <p class="mb-0 leading-tight text-xs">Have a great afternoon..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                            <li class="relative flex items-center px-0 py-2 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                                <div class="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                                    <img src="../assets/img/team-3.jpg" alt="kal" class="w-full shadow-soft-2xl rounded-xl" />
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">Nick Daniel</h6>
                                    <p class="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                                </div>
                                <a class="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
@include('sponsor.layout.footer')