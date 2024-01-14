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

<body>

    @if(session('success') || session('error'))
    <div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="flex flex-col justify-center bg-white p-16 rounded-md shadow-md">
            <div class="flex flex-row justify-center p-5">
                <svg class="w-48 h-48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    @if(session('success'))
                    <g id="SVGRepo_iconCarrier">
                        <circle cx="12" cy="12" r="9" fill="#43A047" fill-opacity="0.24"></circle>
                        <path d="M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5" stroke="#43A047" stroke-width="1.2" stroke-linecap="round"></path>
                        <path d="M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667" stroke="#43A047" stroke-width="1.2" stroke-linecap="round"></path>
                    </g>
                    @elseif(session('error'))
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 20.4C10.8969 20.4 9.80459 20.1827 8.78546 19.7606C7.76632 19.3384 6.84031 18.7197 6.0603 17.9397C5.28029 17.1597 4.66155 16.2337 4.23941 15.2145C3.81727 14.1954 3.6 13.1031 3.6 12C3.6 10.8969 3.81727 9.80459 4.23941 8.78546C4.66155 7.76632 5.28029 6.84031 6.0603 6.0603C6.84032 5.28029 7.76633 4.66155 8.78546 4.23941C9.8046 3.81727 10.8969 3.6 12 3.6C13.1031 3.6 14.1954 3.81727 15.2145 4.23941C16.2337 4.66155 17.1597 5.28029 17.9397 6.0603C18.7197 6.84032 19.3384 7.76633 19.7606 8.78546C20.1827 9.8046 20.4 10.8969 20.4 12C20.4 13.1031 20.1827 14.1954 19.7606 15.2145C19.3384 16.2337 18.7197 17.1597 17.9397 17.9397C17.1597 18.7197 16.2337 19.3384 15.2145 19.7606C14.1954 20.1827 13.1031 20.4 12 20.4L12 20.4Z" stroke="#f53939" stroke-opacity="0.24" stroke-width="1.2"></path>
                        <path d="M9 9L15 15" stroke="#f53939" stroke-width="1.2" stroke-linecap="round"></path>
                        <path d="M15 9L9 15" stroke="#f53939" stroke-width="1.2" stroke-linecap="round"></path>
                    </g>
                    @endif
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
            <button onclick="closeModal()" class="px-5 py-4 rounded-md @if(session('success')) bg-green-500 @elseif(session('error')) bg-red-500 @endif text-white">Tutup</button>
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

    <!-- asd -->
    <section class="py-10 bg-gray-50 sm:py-8 lg:py-16 bg-no-repeat" style="background-image: url('./assets/img/bg/register_bg_2.png'); background-size: 100%;">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="md:hidden flex flex-col items-center justify-center px-4 py-10 sm:py-16 lg:py-24 bg-gray-50 sm:px-6 lg:px-8">

                    <div id="dynamicImageContainer" class="w-full h-full max-w-xs object-contain -mx-12"></div>
                    <!-- <div class="bg-gradient-to-t from-gray-50 from-50% to-transparent to-50% -mt-10 w-full h-14"></div> -->

                    <div id="imageDescriptionTitle" class="text-2xl font-bold text-center text-black"></div>

                    <div id="imageDescription" class="leading-relaxed text-center text-gray-500 mt-2.5"></div>
                    <div class="mt-4 flex flex-row gap-5 justify-between">
                        <button onclick="prevImage()" class="bg-gray-800 text-white px-4 py-2 rounded">
                            < </button>
                                <button onclick="nextImage()" class="bg-gray-800 text-white px-4 py-2 rounded">></button>
                    </div>
                </div>
                <div class="flex items-center justify-center px-4 py-5 sm:px-6 lg:px-8 sm:py-11 lg:py-19 bg-white">
                    <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                        <div class="flex ">
                            <a href="/login" class="px-2 hover:text-red-600">Login
                                <div class="mr-5 w-8 h-1 bg-[#204088]"></div>
                            </a>
                            <a href="/register" class="px-2 mb-4 mx-2"> Register
                            </a>
                        </div>

                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl  pt-5 sm:pt-11 lg:pt-19">Masuk</h2>
                        <p class="mt-2 text-base text-gray-600">Belum mempunyai akun? <a href="/register" title="" class="font-medium text-blue-600 transition-all duration-200 hover:text-blue-700 hover:underline focus:text-blue-700">Buat Akun</a></p>
                        @if ($errors->has('fail'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-5 rounded relative" role="alert">
                            <span class="font-bold block sm:inline">{{ $errors->first('fail') }}</span>
                        </div>
                        @endif
                        <form action="{{route('login')}}" method="post" class="mt-8">
                            @csrf
                            <div class="space-y-5">
                                <div>
                                    <label for="" class="text-base font-medium text-gray-900"> Alamat Email </label>
                                    <div class="mt-2.5">
                                        <input type="email" name="email" id="" placeholder="Masukkan Email Anda" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                    </div>
                                </div>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror

                                <div>
                                    <label for="" class="text-base font-medium text-gray-900"> Password </label>
                                    <div class="mt-2.5 relative">
                                        <input type="password" name="password" id="" placeholder="Masukkan Password" class="pass block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600 caret-blue-600" />
                                        <i class="fa fa-eye-slash eye cursor-pointer absolute top-1/2 right-4 transform -translate-y-1/2"></i>
                                    </div>
                                </div>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror


                                <div class="text-base font-semibold text-white transition-all duration-200 rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600">
                                    <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 ">
                                        Masuk
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
            </div>
        </div>
    </section>

    <!-- asd -->

</body>



<!-- 
<body>
    <section class="absolute w-full h-full">
        <div class="absolute w-full h-full items-center py-16 dark:text-white dark:bg-zinc-900" style="background-image: url('./assets/img/bg/register_bg_2.png'); background-size: 100%;">
            <div class="flex rounded-2xl bg-white shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                <div class="sm:hidden md:hidden lg:block lg:w-1/2 bg-white/30 lg:backdrop-contrast-[0.95]">
                    <div class="flex flex-col h-full">
                        <div class="h-full flex flex-col justify-end">
                            <div class="flex justify-center">
                                <div class="w-36 h-36 bg-violet-800 rounded-full"></div>
                            </div>
                            <div class="backdrop-contrast-[0.95] backdrop-blur-lg -mt-20 bg-white/30 h-1/2"></div>
                        </div>
                    </div>
                </div>


                border-b-[#204088] border-b-4 hover:border-b-[#205ad5]
                <div class="w-full lg:w-1/2 ">
                    <div class="px-20 pt-5 flex ">
                        <a href="/login" class="px-2">Login
                            <div class="mr-5 w-26 h-1 bg-[#204088]"></div>
                        </a>
                        <a href="/register" class="px-2 mb-4 mx-2 hover:text-red-600"> Register
                        </a>
                    </div>
                    <div class=" px-20 my-14">

                        <p class="text-2xl font-semibold dark:text-white text-gray-600">Log in<span class="text-xl font-normal dark:text-white text-gray-600"><br>Welcome back!</span></p>
                        <a href="#" class="flex items-center justify-center rounded-lg shadow-md dark:bg-white hover:bg-gray-100">
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
                                    Log in with Google
                                </span>
                            </button>
                        </a>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                            <a href="#" class="text-xs text-center text-gray-500 uppercase">or login with email</a>
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                        </div>

                        @if ($errors->has('fail'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-5 rounded relative" role="alert">
                            <span class="font-bold block sm:inline">{{ $errors->first('fail') }}</span>
                        </div>
                        @endif

                        <form id="form" action="/login" method="post">
                            @csrf
                            Email
                            <div class="mt-4 bg-[#FBFBFB] rounded border-l-2 border-[#204088] pl-4">
                                <label class="block text-gray-700 text-sm font-bold pt-2 ">Email Address</label>
                                <input name="email" class="bg-[#FBFBFB] text-gray-700 focus:outline-none pb-2 w-full appearance-none" type="email" />
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            password
                            <div class="mt-2 bg-[#FBFBFB] dark:bg-[#071440] dark:text-[#ffffff] text-[#495057] rounded border-l-2 border-[#204088] dark:border-[#06CBE2] px-4 " x-data="{ show: true }">
                                <label class="block text-sm font-bold pt-2 ">Password</label>
                                <div class="relative flex flex-row justify-between gap-3">
                                    <input name="password" class="pass bg-[#FBFBFB] dark:bg-[#071440] focus:outline-none pb-2 w-full appearance-none" type="password" />
                                    <i class="fa fa-eye-slash eye cursor-pointer"></i>
                                </div>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="mt-8">
                                <button class="btn-primary text-white font-bold py-4 px-4 w-1/2 rounded hover:bg-gray-600">Log In</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body> -->

<script>
    var eye_1 = document.querySelector(".eye");
    var pass1 = document.querySelector(".pass");
    var seteye_1 = document.querySelector(".eye");

    eye_1.addEventListener('click', function() {
        if (pass1.type == "password") {
            pass1.type = "text";
            seteye_1.classList.remove('fa-eye-slash');
            seteye_1.classList.add('fa-eye');
        } else {
            pass1.type = "password";
            seteye_1.classList.add('fa-eye-slash');
            seteye_1.classList.remove('fa-eye');
        }
    });
</script>

<script>
    const dynamicImageContainer = document.getElementById('dynamicImageContainer');
    const imageDescriptionTitleContainer = document.getElementById('imageDescriptionTitle');
    const imageDescriptionContainer = document.getElementById('imageDescription');

    const imagePaths = [
        "{{ asset('assets/img/login1.svg')}}",
        "{{ asset('assets/img/login3.png')}}",
        "{{ asset('assets/img/icon2.png')}}"
    ];
    const imageDescriptionsTitle = [
        "Revent adalah website bla bla bla",
        "About Revent, Revent berdiri bla bla",
        "Sect"
    ];
    const imageDescriptions = [
        "Revent adalah website bla bla bla",
        "About Revent, Revent berdiri bla bla",
        "Sect adalah website untuk mempertemukan orang yang ingin mengadakan event dengan sponsorship."
    ];

    let currentImageIndex = 0;

    function changeImage() {
        dynamicImageContainer.innerHTML = `<img src="${imagePaths[currentImageIndex]}" alt="Dynamic Image" class="w-full h-full object-contain">`;
        imageDescriptionTitleContainer.textContent = imageDescriptionsTitle[currentImageIndex];
        imageDescriptionContainer.textContent = imageDescriptions[currentImageIndex];

        setTimeout(() => {
            currentImageIndex = (currentImageIndex + 1) % imagePaths.length;
            changeImage(delay);
        }, delay);
    }

    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + imagePaths.length) % imagePaths.length;
        changeImage(200);
    }

    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % imagePaths.length;
        changeImage(200);
    }

    // Call the function to start changing images
    changeImage(200);
</script>
<!-- plugin for charts  -->
<script src="/assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>