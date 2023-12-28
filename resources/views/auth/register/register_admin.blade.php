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

<body><!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
    <section class="absolute w-full h-full">
        <div class="items-center py-16 dark:text-white dark:bg-[#101b37]" style="background-image: url('./assets/img/bg/register_bg_2.png');">
            <div class="flex rounded-2xl bg-white shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                <div class="hidden lg:block lg:w-1/2 object-center" style="background-image: url('./assets/img/bg/bg_gradient.svg');">
                    <div class=" flex justify-center py-20 font-bold h-full">
                        <div class="flex flex-col bg-white/30 lg:backdrop-contrast-[0.95] w-9/12 justify-start rounded-md">
                            <div class="mt-20">asdaasdasdsd</div>
                            <div class="flex w-full pt-20">
                                <div class="w-2/3 m-4">
                                    <button class="p-2 w-full focus:text-white focus:rounded-xl focus:bg-[#95cafb] focus:ring focus:ring-violet-300">
                                        <img src="assets/img/illustrations/Partnership-amico.svg" alt="">
                                        <div class="text-center">Sponsor</div>
                                    </button>
                                </div>
                                <div class="w-2/3 m-4">
                                    <button class="p-2 w-full focus:text-white focus:rounded-xl focus:bg-[#95cafb] focus:ring focus:ring-violet-300">
                                        <img src="assets/img/illustrations/team checklist-amico.svg" alt="">
                                        <div class="text-center">Mahasiswa</div>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="w-full lg:w-1/2 ">
                    <div class="px-20 pt-5 flex">
                        <a href="/login" class="px-2 hover:text-red-600">Login</a>
                        <a href="/register" class="px-2 mb-4 mx-2">Register <div class="ml-5 w-26 h-1 bg-[#204088]"></div></a>
                    </div>
                    <div class="px-20 my-14">

                        <p class="text-2xl font-semibold dark:text-white text-gray-600">Register<span class="text-xl font-normal dark:text-white text-gray-600"><br>Welcome back!</span></p>
                        <a href="#" class="flex items-center justify-center text-white rounded-lg shadow-md dark:bg-white hover:bg-gray-100">
                            <button class="w-full max-w-xs font-bold shadow-sm rounded-lg py-1 text-gray-800 flex items-center justify-center ">
                                <div class=" p-2 ">
                                    <svg class="w-4" viewBox="0 0 533.5 544.3">
                                        <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4" />
                                        <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853" />
                                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04" />
                                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335" />
                                    </svg>
                                </div>
                                <span class="ml-4">
                                    Continue with Google
                                </span>
                            </button>
                        </a>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                            <a href="#" class="text-xs text-center text-gray-500 uppercase">or Signup with email</a>
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                        </div>
                        <form id="form" action="/register" method="post">
                            @csrf
                            <!-- Nama Lengkap -->
                            <div class="mt-4 bg-gray-200 rounded border-l-2 border-[#204088] pl-4">
                                <label class="block text-gray-700 text-sm font-bold pt-2 ">Nama Lengkap</label>
                                <input name="username" class="bg-gray-200 text-gray-700 focus:outline-none pb-2 w-full appearance-none" type="email" />
                                @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="mt-2 bg-gray-200 rounded border-l-2 border-[#204088] pl-4">
                                <label class="block text-gray-700 text-sm font-bold pt-2 ">Email Address</label>
                                <input name="email" class="bg-gray-200 text-gray-700 focus:outline-none pb-2 w-full appearance-none" type="text" />
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mt-2 bg-gray-200 rounded border-l-2 border-[#204088] pl-4">
                                <label class="block text-gray-700 text-sm font-bold pt-2 ">Password</label>
                                <input name="password" class="bg-gray-200 text-gray-700 focus:outline-none pb-2 w-full appearance-none" type="password" />
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex items-start mt-3 mb-6">
                                <div class="flex items-center h-5">
                                    <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required>
                                </div>
                                <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
                            </div>

                            <div class="mt-8">
                                <button class="bg-[#204088] text-white font-bold py-4 px-4 w-1/2 rounded hover:bg-gray-600">Signup</button>
                            </div>
                        </form>
                        <!-- <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 md:w-1/4"></span>
                            <a href="#" class="text-xs text-gray-500 uppercase">or sign up</a>
                            <span class="border-b w-1/5 md:w-1/4"></span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <script src="coba.js"></script>
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