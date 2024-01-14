@include('mahasiswa.layout.header')
<nav id="navbar" class='py-4 px-4 mx-auto w-full max-w-screen sm:px-6 lg:px-8 min-h-[70px] bg-gray-50 fixed z-40 top-0'>
    <div class='flex flex-wrap items-center justify-between gap-5'>
        <img class="w-auto h-12 max-w-full" src="{{asset('assets/img/icon2.png')}}" alt="" />
        <div class='flex lg:order-1 max-sm:ml-auto'>
            <ul>
                <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'>
                    @auth
                    <!-- start -->
                    <a class="relative flex items-center pr-2">
                        <p class="hidden transform-dropdown-show"></p>
                        <a class="z-50 block p-0 transition-all text-sm ease-nav-brand text-slate-500 h-10 w-10 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white" dropdown-trigger aria-expanded="false">
                            @if(auth()->check() && auth()->user()->profile && auth()->user()->profile->photo_account == null)
                            <svg class="w-full h-full object-cover text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                            </svg>
                            @elseif(auth()->check() && auth()->user()->profile)
                            <img src="{{ asset('storage/' . auth()->user()->profile->photo_account) }}" class="w-full h-full object-cover" />
                            @endif
                        </a>
                        <ul dropdown-menu class=" z-50 mx-5 text-sm transform-dropdown lg:shadow-soft-3xl duration-250 min-w-44 pointer-events-none absolute right-0 top-0 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:text-white sm:-ml-2 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                            <!-- add show class on dropdown open js -->
                            <li class="relative mb-2 ">
                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="/profile">
                                    <div class="flex flex-col">
                                        <div class="flex flex-row justify-center my-5">
                                            @if(auth()->check() && auth()->user()->profile && auth()->user()->profile->photo_account == null)
                                            <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                            </svg>
                                            @elseif(auth()->check() && auth()->user()->profile)
                                            <img src="{{ asset('storage/' . auth()->user()->profile->photo_account) }}" class="inline-flex items-center justify-center text-white text-sm h-9 w-9 max-w-none rounded-xl" />
                                            @endif
                                        </div>
                                        <div class="flex flex-row justify-center">
                                            <h6 class="mb-1 font-semibold leading-normal text-sm">{{ auth()->user()->name}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <hr class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                            <!-- sonsorship -->
                            <li class="relative">
                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="/sponsorship">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <svg class="items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl p-1" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 403.051 403.051" xml:space="preserve" stroke="#ffffff">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g id="XMLID_308_">
                                                        <path id="XMLID_309_" d="M144.957,148.066l31.82-31.82l-21.213-21.213L49.498,201.1l144.951,144.953 c0.001,0.001,0.003,0.003,0.004,0.004c5.85,5.849,15.367,5.849,21.215,0.001c2.834-2.834,4.395-6.601,4.395-10.607 c0-4.002-1.559-7.767-4.388-10.599c-0.002-0.003-0.005-0.004-0.007-0.006c-0.001-0.001-0.002-0.003-0.004-0.005l-21.21-21.209 c-5.858-5.858-5.858-15.355-0.001-21.213c5.857-5.857,15.355-5.858,21.214,0l21.214,21.213c0.002,0.002,0.004,0.005,0.007,0.008 c5.85,5.84,15.36,5.838,21.206-0.007c5.848-5.849,5.849-15.365,0-21.213c-0.004-0.005-0.008-0.01-0.014-0.015l-21.199-21.199 c-5.857-5.858-5.857-15.355,0-21.213c5.857-5.857,15.355-5.858,21.213-0.001l21.209,21.208c0.005,0.005,0.009,0.01,0.014,0.015 c5.849,5.836,15.353,5.835,21.199-0.005c0.002-0.002,0.004-0.003,0.005-0.005l0.01-0.01c2.826-2.833,4.384-6.595,4.384-10.597 c0.001-4.001-1.555-7.761-4.381-10.592l-7.084-7.085c-0.002-0.002-0.004-0.004-0.006-0.007l-53.026-53.026l-31.82,31.82 c-0.001,0.001-0.001,0.001-0.001,0.001c-8.772,8.771-20.295,13.158-31.818,13.158c-11.524,0-23.047-4.387-31.82-13.16 c-17.541-17.542-17.543-46.083-0.008-63.63C144.951,148.073,144.954,148.069,144.957,148.066z"></path>
                                                        <polygon id="XMLID_311_" points="129.886,78.287 134.352,73.821 113.137,52.607 0,165.745 21.213,186.958 "></polygon>
                                                        <path id="XMLID_312_" d="M208.607,126.842c-0.004,0.004-0.007,0.008-0.011,0.012c-0.004,0.004-0.008,0.007-0.012,0.01 l-42.413,42.415c-0.002,0.001-0.002,0.001-0.003,0.002c-5.847,5.85-5.846,15.365,0.001,21.212 c5.85,5.848,15.366,5.849,21.215-0.001l42.426-42.426c2.813-2.813,6.629-4.394,10.606-4.394c3.979,0,7.794,1.581,10.606,4.394 l63.637,63.637c0,0.001,0.002,0.001,0.002,0.001l7.069,7.069c0.001,0.001,0.001,0.001,0.003,0.002 c0.001,0.001,0.002,0.003,0.004,0.005l10.602,10.602l21.213-21.213L240.416,95.033L208.607,126.842z"></path>
                                                        <rect id="XMLID_333_" x="247.339" y="108.318" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 480.1409 445.516)" width="170.001" height="30"></rect>
                                                    </g>
                                                </g>
                                            </svg>

                                            <!-- <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl" /> -->
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 font-normal leading-normal text-sm">Sponsorship</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- pengaturan -->
                            <li class="relative">
                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="/profile">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl">
                                                <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 01-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 016.126 3.537zM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 010 .75l-1.732 3.001c-.229.396-.76.498-1.067.16A5.231 5.231 0 016.75 12c0-1.362.519-2.603 1.37-3.536zM10.878 17.13c-.447-.097-.623-.608-.394-1.003l1.733-3.003a.75.75 0 01.65-.375h3.465c.457 0 .81.408.672.843a5.252 5.252 0 01-6.126 3.538z" />
                                                <path fill-rule="evenodd" d="M21 12.75a.75.75 0 000-1.5h-.783a8.22 8.22 0 00-.237-1.357l.734-.267a.75.75 0 10-.513-1.41l-.735.268a8.24 8.24 0 00-.689-1.191l.6-.504a.75.75 0 10-.964-1.149l-.6.504a8.3 8.3 0 00-1.054-.885l.391-.678a.75.75 0 10-1.299-.75l-.39.677a8.188 8.188 0 00-1.295-.471l.136-.77a.75.75 0 00-1.477-.26l-.136.77a8.364 8.364 0 00-1.377 0l-.136-.77a.75.75 0 10-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 00-1.3.75l.392.678a8.29 8.29 0 00-1.054.885l-.6-.504a.75.75 0 00-.965 1.149l.6.503a8.243 8.243 0 00-.689 1.192L3.8 8.217a.75.75 0 10-.513 1.41l.735.267a8.222 8.222 0 00-.238 1.355h-.783a.75.75 0 000 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 10.513 1.41l.735-.268c.197.417.428.816.69 1.192l-.6.504a.75.75 0 10.963 1.149l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 101.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.771a.75.75 0 101.477.26l.137-.772a8.376 8.376 0 001.376 0l.136.773a.75.75 0 101.477-.26l-.136-.772a8.19 8.19 0 001.294-.47l.391.677a.75.75 0 101.3-.75l-.393-.679a8.282 8.282 0 001.054-.885l.601.504a.75.75 0 10.964-1.15l-.6-.503a8.24 8.24 0 00.69-1.191l.735.268a.75.75 0 10.512-1.41l-.734-.268c.115-.438.195-.892.237-1.356h.784zm-2.657-3.06a6.744 6.744 0 00-1.19-2.053 6.784 6.784 0 00-1.82-1.51A6.704 6.704 0 0012 5.25a6.801 6.801 0 00-1.225.111 6.7 6.7 0 00-2.15.792 6.784 6.784 0 00-2.952 3.489.758.758 0 01-.036.099A6.74 6.74 0 005.251 12a6.739 6.739 0 003.355 5.835l.01.006.01.005a6.706 6.706 0 002.203.802c.007 0 .014.002.021.004a6.792 6.792 0 002.301 0l.022-.004a6.707 6.707 0 002.228-.816 6.781 6.781 0 001.762-1.483l.009-.01.009-.012a6.744 6.744 0 001.18-2.064c.253-.708.39-1.47.39-2.264a6.74 6.74 0 00-.408-2.308z" clip-rule="evenodd" />
                                            </svg>
                                            <!-- <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl" /> -->
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 font-normal leading-normal text-sm">Pengaturan</h6>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <!-- Logout -->
                            <!-- <button type="submit" class="block px-4 py-2">Logout -->
                            <form action="/logout" method="post" class="">
                                @csrf
                                <button class="relative" type="submit">
                                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                                        <div class="flex py-1">
                                            <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm  bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 rounded-xl">
                                                <svg class="w-6 h-6" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <title>entrance_fill</title>
                                                        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <g id="System" transform="translate(-672.000000, -144.000000)" fill-rule="nonzero">
                                                                <g id="entrance_fill" transform="translate(672.000000, 144.000000)">
                                                                    <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path>
                                                                    <path d="M12,2.5 C12.8284,2.5 13.5,3.17157 13.5,4 C13.5,4.82843 12.8284,5.5 12,5.5 L12,5.5 L7,5.5 C6.72386,5.5 6.5,5.72386 6.5,6 L6.5,6 L6.5,18 C6.5,18.2761 6.72386,18.5 7,18.5 L7,18.5 L11.5,18.5 C12.3284,18.5 13,19.1716 13,20 C13,20.8284 12.3284,21.5 11.5,21.5 L11.5,21.5 L7,21.5 C5.067,21.5 3.5,19.933 3.5,18 L3.5,18 L3.5,6 C3.5,4.067 5.067,2.5 7,2.5 L7,2.5 Z M18.0606,8.11091 L20.889,10.9393 C21.4748,11.5251 21.4748,12.4749 20.889,13.0607 L18.0606,15.8891 C17.4748,16.4749 16.5251,16.4749 15.9393,15.8891 C15.3535,15.3033 15.3535,14.3536 15.9393,13.7678 L16.207,13.5 L12,13.5 C11.1716,13.5 10.5,12.8284 10.5,12 C10.5,11.1716 11.1716,10.5 12,10.5 L16.207,10.5 L15.9393,10.2322 C15.3535,9.64645 15.3535,8.6967 15.9393,8.11091 C16.5251,7.52513 17.4748,7.52513 18.0606,8.11091 Z" id="形状结合" fill="#ffffff"> </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <div type="submit" class="mb-1 font-normal leading-normal text-sm">Keluar Akun</div>
                                            </div>
                                        </div>
                                    </a>
                                </button>
                            </form>
                        </ul>
                    </a>
                    <!-- end -->
                    @endauth
                </li>
            </ul>
            <button id="toggle" class='lg:hidden ml-7'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul id="collapseMenu" class='lg:!flex lg:space-x-5 max-lg:space-y-2 max-lg:hidden max-lg:py-4 max-lg:w-full'>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'>
                <a href="/" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80">
                    Beranda </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'> <a href="/sponsor" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80">
                    Sponsor </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href="/about" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80">
                    Tentang </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href="/contact" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80">
                    Kontak </a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href="/chat" title="" class="text-base font-semibold text-black transition-all duration-200 hover:text-opacity-80">
                    Pesan </a>
            </li>
        </ul>
    </div>
</nav>



<!-- end navbar -->
@yield('content')

@include('mahasiswa.layout.footer')