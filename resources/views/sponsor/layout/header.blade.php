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
</head>

<body class="m-0 text-base antialiased font-normal leading-default bg-[#f8f9fa] dark:bg-[#06052F]">
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
                modal.classList.add('hidden sm:hi');
                modal.classList.remove('opacity-0');
            }, 300);
        }

        // Panggil fungsi openModal ketika halaman dimuat
        window.onload = openModal;
    </script>
    @endif