@extends('sponsor.layout.basetemplate')
@section('content')

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

<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                @forelse($partnership as $item)
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Data Mahasiswa</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Perguruan Tinggi</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Daftar</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                @php
                                                $photo_profile = '-';
                                                if(isset($item->mahasiswa->profile->photo_account)){
                                                $photo_profile = $item->mahasiswa->profile->photo_account;
                                                }
                                                @endphp
                                                @if($photo_profile === '-')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 mr-4">
                                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                                </svg>
                                                @else
                                                <img src="{{ asset('storage/' . $photo_profile) }} " class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                                                @endif
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{ $item->nama ?? '-' }}</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">{{ $item->email ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->universitas ?? '-' }}</p>
                                    </td>

                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{ $item->created_at ?? '-' }}</span>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <!-- Modal -->
                                        @if ($item->status === 'pending')
                                        <form method="POST" action="{{secure_url('sponsor.update', ['id' => $item->mahasiswa_id])}}">
                                            @csrf
                                            <div class="flex items-center justify-center">
                                                <div class="modal hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto" id="modal{{ $item->mahasiswa_id }}">
                                                    <div class="modal-container bg-white w-1/2 p-8 rounded-lg shadow-lg">
                                                        <h2 class="text-xl font-semibold">Konfirmasi Perubahan Status</h2>
                                                        <p>Apakah Anda yakin ingin menyimpan perubahan status?</p>

                                                        <div class="mt-4 flex flex-row justify-end gap-2">
                                                            <div class="bg-red-500 hover:bg-red-600 rounded  mr-2 ">
                                                                <button class=" text-white font-medium py-2 px-4 cancelButton" type="button">Batal</button>
                                                            </div>
                                                            <div class="bg-blue-600 hover:bg-blue-600 rounded">
                                                                <button class=" text-white font-medium py-2 px-4 " type="submit" id="saveButton">Simpan</button>
                                                            </div>

                                                            <!-- <button class="btn-secondary" type="" id="cancelButton">Batal</button>
                                                            <button class="btn-secondary" type="submit" id="saveButton">Simpan Perubahan</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                            <div class="flex flex-row gap-2">
                                                <select name="sponsor_status" class="rounded p-1">
                                                    <option value="accepted">Accept</option>
                                                    <option value="rejected">Reject</option>
                                                </select>
                                                <div class="bg-color-system text-white p-1 rounded">
                                                    <button type="button" class="showModalButton" data-modal-id="{{ $item->mahasiswa_id }}">Simpan Perubahan</button>

                                                </div>
                                            </div>

                                        </form>
                                        @elseif ($item->status === 'accepted')
                                        <span class="bg-gradient-to-tl from-green-600 to-lime-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                        @elseif ($item->status === 'rejected')
                                        <span class="bg-gradient-to-tl from-red-600 to-rose-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                        @endif

                                        <!-- <button type="submit" class="block px-4 py-2 ">Accept</button>
                                        <button type="submit" class="block px-4 py-2 ">Reject</button> -->
                                        <!-- <a href="javascript:;" class="text-xs font-semibold leading-tight text-slate-400"> Detail </a> -->
                                    </td>
                                    @if ($item->lpj === null && $item->status != 'rejected')
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">Proses</span>
                                    </td>
                                    @elseif($item->lpj != null || $item->status === 'rejected')
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">Selesai</span>
                                    </td>
                                    @endif


                                    @if ($item->status === 'accepted' && $item->mou === null)
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <!-- Tombol "Detail" -->
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showModal({{ $item->mahasiswa_id }})">Detail</button>
                                        <!-- Modal -->
                                        <div id="detailModal" class="fixed hidden inset-0 w-full h-full flex items-center justify-center">
                                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                <!-- Latar Belakang Modal -->
                                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                </div>
                                                <!-- Modal Itself -->
                                                <div id="detailContent"> </div>

                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
                @empty
                <div class="px-4 py-3 my-5 rounded" role="alert">
                    <span class="font-bold  sm:inline">Belum ada kerja sama</span>
                    <br>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
</main>
</div>
</div>
<script>
    function showModal(mahasiswa_id) {

        var data = @json($partnership); // Mengonversi data PHP ke JSON
        var partner = data.find(item => item.mahasiswa_id === mahasiswa_id).mahasiswa_id;
        var showsecure_url = "{{ secure_url('sponsor.upload', ':id') }}";
        showsecure_url = showsecure_url.replace(':id', partner);
        var detailContent = `
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                <div class="p-5 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                                    <div class="bg-white">
                                                        <div class="sm:flex sm:items-start p-4 justify-center">
                                                            <div class="mt-3 text-center sm:text-left">
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                                    Konfirmasi
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">
                                                                        Apakah Anda yakin ingin mengirim data ini?
                                                                        </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- upload mou -->
                                                        <form method="POST" action="${showsecure_url}" enctype="multipart/form-data">
                                                        
                                                            @csrf
                                                            <div class="flex flex-col justify-center text-center my-5">
                                                                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">MOU</label>
                                                                <div class="mt-2 flex items-center gap-x-3 justify-center">
                                                                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    <input type="file" class="form-control @error('mou') is-invalid @enderror" name="mou">
                                                                </div>
                                                                @error('mou')
                                                                <p class="text-red-600 text-sm">{{ $message }}</p>
                                                                @enderror
                                                            </div>

                                                            <div class="bg-gray-50 p-4 sm:px-6 sm:py-4 sm:flex sm:flex-row-reverse">
                                                            <div class="bg-blue-600 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                            <button type="submit">
                                                                    Konfirmasi
                                                                </button>
                                                            </div>   
                                                        
                                                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="hideModal()">
                                                                    Batal
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <!-- end upload mou -->
                                                    </div>
                                                </div>
        `;
        document.getElementById('detailContent').innerHTML = detailContent;
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function hideModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
</script>

@endsection