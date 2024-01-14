<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>


<!-- asd -->
<section class="py-10 bg-gray-50 sm:py-8 lg:py-16 bg-no-repeat" style="background-image: url('./assets/img/bg/register_bg_2.png'); background-size: 100%;">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-5 sm:px-6 lg:px-8 sm:py-11 lg:py-19 bg-white">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                    <div class="flex ">
                        <a href="/login" class="px-2 hover:text-red-600">Login
                        </a>
                        <a href="/register" class="px-2 mb-4 mx-2"> Register
                            <div class="mr-5 w-8 h-1 bg-[#204088]"></div>
                        </a>
                    </div>

                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl  pt-5 sm:pt-11 lg:pt-19">Buat Akun</h2>
                    <p class="mt-2 text-base text-gray-600">Sudah mempunyai akun? <a href="/login" title="" class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 hover:underline focus:text-blue-700">Masuk</a></p>

                    <form action="{{route('register')}}" method="post" class="mt-8">
                        @csrf
                        @session('error')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-5 rounded relative" role="alert">
                            <span class="font-bold block sm:inline">{{ session('error') }}</span>
                        </div>
                        @endsession
                        <div class="space-y-5">
                            <!-- nama lengkap -->
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Nama Lengkap </label>
                                <div class="mt-2.5">
                                    <input type="text" name="name" id="" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                            </div>
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Email -->
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Alamat Email </label>
                                <div class="mt-2.5">
                                    <input type="email" name="email" id="" placeholder="Masukkan Email Aktif Anda" value="{{ old('email') }}" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Password -->
                            <!-- <div class="mt-2 bg-[#FBFBFB] rounded border-l-2 border-[#204088] pl-4">
                                <label class="block text-gray-700 text-sm font-bold pt-2 ">Password</label>
                                <input name="password" class="bg-[#FBFBFB] text-gray-700 focus:outline-none pb-2 w-full appearance-none" type="password" />
                            </div> -->
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Password </label>
                                <div class="mt-2.5">
                                    <input type="password" name="password" id="" placeholder="Masukkan Password" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                </div>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <!-- Password -->
                            <div>
                                <label for="" class="text-base font-medium text-gray-900"> Role </label>
                                <div class="mt-2.5">
                                    <select name="role" id="role" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600">
                                        <option value="" disabled selected class="text-gray-500">Pilih Role</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="sponsor">Sponsor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="agree" id="agree" class="w-5 h-5 text-blue-600 bg-white border-gray-200 rounded" />

                                <label for="agree" class="ml-3 text-sm font-medium text-gray-500">
                                    Saya menyetujui <a href="#" title="" class="text-blue-600 hover:text-blue-700 hover:underline">Ketentuan Layanan</a> dan <a href="#" title="" class="text-blue-600 hover:text-blue-700 hover:underline">Kebijakan Privasi</a> Sect
                                </label>
                            </div>

                            <div class="text-base font-semibold text-white transition-all duration-200 rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600">
                                <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 ">
                                    Buat Akun
                                </button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ url('login/google') }}">
                        <div class="mt-3 space-y-3">
                            <button type="button" class="relative inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-md hover:bg-gray-100 focus:bg-gray-100 hover:text-black focus:text-black focus:outline-none">
                                <div class="absolute inset-y-0 left-0 p-4">
                                    <svg class="w-6 h-6 text-rose-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
                                    </svg>
                                </div>
                                Masuk Dengan Google
                            </button>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-gray-50 sm:px-6 lg:px-8">
                <div>
                    <!-- <img class="w-full mx-auto" src="https://cdn.rareblocks.xyz/collection/celebration/images/signup/1/cards.png" alt="" />

                    <div class="w-full max-w-md mx-auto xl:max-w-xl">
                        <h3 class="text-2xl font-bold text-center text-black">Design your own card</h3>
                        <p class="leading-relaxed text-center text-gray-500 mt-2.5">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>

                        <div class="flex items-center justify-center mt-10 space-x-3">
                            <div class="bg-orange-500 rounded-full w-20 h-1.5"></div>

                            <div class="bg-gray-200 rounded-full w-12 h-1.5"></div>

                            <div class="bg-gray-200 rounded-full w-12 h-1.5"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- asd -->







</body>
<!-- plugin for charts  -->
<script src="/assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>