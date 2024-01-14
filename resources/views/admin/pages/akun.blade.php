@extends('admin.layout.basetemplate')
@section('content')
<div class="w-full px-6 py-6 mx-auto">
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
    <!-- table 1 -->
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Daftar Akun</h6>
                    <div>
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                            <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal  transition-all">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
                        </div>
                    </div>
                </div>

                <div class="flex-auto px-0 pt-0">
                    <div class="p-0 overflow-x-auto">
                        <table id="myTable" class="items-center w-full mb-0 align-top border-gray-200 ">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Role</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Dibuat</th>
                                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($get as $item)
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            @php
                                            $photo_profile = '-';
                                            if(isset($item->profile->photo_account)){
                                            $photo_profile = $item->profile->photo_account;
                                            }
                                            @endphp
                                            @if($photo_profile === '-')
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 mr-4">
                                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                            </svg>
                                            @else
                                            <img src="{{ asset('storage/' . $photo_profile) }} " class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                                            @endif
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{$item['name']}}</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">{{$item['email']}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{$item['role']}}</p>
                                        <!-- <p class="mb-0 text-xs leading-tight text-slate-400">Organization</p> -->
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{$item['created_at']}}</span>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                        <!-- modal -->
                                        <!-- Tombol Edit -->
                                        <button type="button" class="text-xs font-semibold leading-tight text-slate-400 showModalButton" data-modal-id="{{ $item->id }}">Edit</button>
                                        <!-- Modal Edit -->
                                        <div class="modal hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto" id="modal{{ $item->id }}">
                                            <div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75"></div>
                                            <div class="modal-container bg-white w-1/2 p-8 rounded-lg shadow-lg z-50">
                                                <!-- Konten Modal -->
                                                <h2 class="text-xl font-semibold mb-4">Edit Akun</h2>
                                                <!-- Form Edit -->
                                                <form method="POST" action="{{ route('update.account', ['id' => $item->id]) }}">
                                                    @csrf
                                                    <!-- name -->
                                                    <div class="mb-4">
                                                        <label for="name" class="block text-sm font-medium text-gray-700">name</label>
                                                        <input type="text" name="name" id="name" value="{{ $item->name }}" class="mt-1 p-2 border rounded-md w-full" required>
                                                    </div>
                                                    <!-- Email -->
                                                    <div class="mb-4">
                                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                        <input type="email" name="email" id="email" value="{{ $item->email }}" class="mt-1 p-2 border rounded-md w-full" required>
                                                    </div>
                                                    <!-- Role -->
                                                    <div class="mb-4">
                                                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                                        <select name="role" id="role" class="mt-1 p-2 border rounded-md w-full" required>
                                                            <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                            <option value="mahasiswa" {{ $item->role === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                            <option value="sponsor" {{ $item->role === 'sponsor' ? 'selected' : '' }}>Sponsor</option>
                                                        </select>
                                                    </div>
                                                    <!-- Password -->
                                                    <div class="mb-4">
                                                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                                        <input type="password" name="password" id="password" class="mt-1 p-2 border rounded-md w-full">
                                                    </div>
                                                    <!-- Tombol Simpan -->
                                                    <div class="mt-4 flex flex-row justify-end gap-2">
                                                        <div class="bg-red-500 hover:bg-red-600 text-white font-medium rounded">
                                                            <button class="cancelButton py-2 px-4" type="button">Batal</button>
                                                        </div>
                                                        <div class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded ">
                                                            <button class="saveButton  py-2 px-4" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <!-- Tombol Delete -->
                                        <form method="POST" action="{{ route('delete.account', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-semibold leading-tight text-slate-400">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                                @endforelse
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</main>
@endsection