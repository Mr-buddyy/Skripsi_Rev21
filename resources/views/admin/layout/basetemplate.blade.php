@include('admin.layout.header')
@include('admin.layout.navbarside')

<!-- end sidenav -->

<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
    <nav class="dark:bg-zinc-700 dark:shadow-md dark:shadow-white bg-white my-4 relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit ">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50 text-slate-700" href="javascript:;">Admin</a>
                    </li>
                    @if($page === 'dashboard')
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Dashboard</li>
                    @elseif($page === 'sponsorship')
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Sponsorship</li>
                    @elseif($page === 'akun')
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Akun</li>
                    @elseif($page === 'feedback')
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Feedback</li>
                    @endif
                </ol>
                <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
            </nav>

            <div id="dropdown-wrapper" class="max-h-10 css z-50">
                <button onclick="toggleMenu()" class=" block h-10 w-10 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white">
                    @if(auth()->check() && auth()->user()->profile && auth()->user()->profile->photo_account == null)
                    <svg class="w-full h-full object-cover text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    @elseif(auth()->check() && auth()->user()->profile)
                    <img src="{{ asset('storage/' . auth()->user()->profile->photo_account) }}" class="w-full h-full object-cover" />
                    @endif
                 </button>

                <div id="menu" class="my-4 py-2  hidden bg-white drop-shadow-md rounded-lg absolute right-0">
                    <a class="block px-4 py-2 hover:bg-sky-500 hover:text-white" href="/sponsor/profile">Profile</a>
                    <form action="/logout" method="post" class="hover:bg-sky-500 hover:text-white">
                        @csrf
                        <button type="submit" class="block px-4 py-2 ">Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </nav>

    <!-- end Navbar -->

    @yield('content')
</main>

@include('admin.layout.footer')