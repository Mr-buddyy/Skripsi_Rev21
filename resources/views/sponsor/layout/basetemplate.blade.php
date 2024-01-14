@include('sponsor.layout.header')
@include('sponsor.layout.navbarside')

<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    @if (
    auth()->user()->profile &&
    auth()->user()->profile->nama_perusahaan !== null &&
    auth()->user()->profile->deskripsi !== null &&
    auth()->user()->profile->alamat !== null &&
    auth()->user()->profile->telpon !== null &&
    auth()->user()->profile->jumlah_peserta !== null &&
    auth()->user()->profile->photo_perusahaan !== null
    )
    @else
    <div class="mx-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-5 rounded relative" role="alert">
        <span class="font-bold block sm:inline">Lengkapi Profil Perusahaan Anda Terlebih Dahulu, Untuk Dapat Menjalin Kerja Sama</span>
    </div>
    @endif
    <!-- Navbar -->
    <nav class="dark:bg-zinc-700 dark:shadow-md dark:shadow-white bg-white my-4 relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit ">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">sponsosrship</li>
                </ol>
                <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
            </nav>
        </div>
    </nav>

    <!-- end Navbar -->

    @yield('content')
</main>

@include('sponsor.layout.footer')