@extends('sponsor.layout.basetemplate')
@section('content')

<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Daftar Kerja Sama</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            @php
                            $firstIteration = true;
                            @endphp
                            @forelse($partnership as $item)
                            @if ($item->status !== 'rejected')
                            <thead class="align-bottom">
                                @if($firstIteration)
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Perguruan Tinggi</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Daftar</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Proposal</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">MOU</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">LPJ</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                @php
                                $firstIteration = false;
                                @endphp
                                @endif
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
                                        <a href="{{ url('/storage/' . $item->proposal) }}" target="_blank" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-r from-fuchsia-600 to-blue-600 transition-transform hover:scale-105">
                                            Unduh Proposal
                                        </a>
                                    </td>

                                    <!-- MOU -->
                                    @if ($item->mou !== null)
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="{{ url('/storage/' . $item->mou) }}" target="_blank" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-r from-fuchsia-600 to-blue-600 transition-transform hover:scale-105">
                                            Unduh MOU
                                        </a>
                                    </td>
                                    @else
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">Belum diupload</span>
                                    </td>
                                    @endif
                                    <!-- end MOU -->

                                    <!-- LPJ -->
                                    @if ($item->lpj !== null)
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="{{ url('/storage/' . $item->mou) }}" target="_blank" class="px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white bg-gradient-to-r from-fuchsia-600 to-blue-600 transition-transform hover:scale-105">
                                            Unduh LPJ
                                        </a>
                                    </td>
                                    @else
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">Belum diupload</span>
                                    </td>
                                    @endif
                                    <!-- end LPJ -->

                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <!-- Modal -->
                                        @if ($item->status === 'pending')
                                        <form method="POST" action="{{route('sponsor.update', ['id' => $item->mahasiswa_id])}}">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->

                                            <div class="flex flex-row gap-2">
                                                <select name="sponsor_status" class="rounded p-1">
                                                    <option value="accepted">Terima</option>
                                                    <option value="rejected">Tolak</option>
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
                            @else
                            <div class="px-4 py-3 my-5" role="alert">
                                <div class="px-4 py-3 my-5 font-bold sm:inline bg-red-100 border border-red-400 text-red-700 rounded relative">
                                    Belum Ada Permintaan Kerja Sama
                                </div>
                            </div>
                            @break
                            @endif
                            @empty
                            <div class="px-4 py-3 my-5" role="alert">
                                <div class="px-4 py-3 my-5 font-bold sm:inline bg-red-100 border border-red-400 text-red-700 rounded relative">
                                    Belum Ada Permintaan Kerja Sama
                                </div>
                            </div>
                            @endforelse
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- tabel 2  -->
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Daftar Kerja Sama Ditolak</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            @php
                            $firstIteration = true;
                            @endphp
                            @forelse($partnership as $item)
                            @if ($item->status !== 'rejected')
                            <thead class="align-bottom">
                                @if($firstIteration)
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Perguruan Tinggi</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Daftar</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                                @php
                                $firstIteration = false;
                                @endphp
                                @endif
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
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
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{ $item->nama ?? '-' }}</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">{{ $item->email ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2  text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->universitas ?? '-' }}</p>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{ $item->created_at ?? '-' }}</span>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="bg-gradient-to-tl from-red-600 to-rose-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->status }}</span>
                                    </td>
                                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">Selesai</span>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <div class="px-4 py-3 my-5" role="alert">
                                    <div class="px-4 py-3 my-5 font-bold sm:inline bg-red-100 border border-red-400 text-red-700 rounded relative">
                                        Belum Ada Permintaan Kerja Sama
                                    </div>
                                </div>
                            </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>

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
        var showroute = "{{ route('sponsor.upload', ':id') }}";
        showroute = showroute.replace(':id', partner);
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
                                                        <form method="POST" action="${showroute}" enctype="multipart/form-data">
                                                        
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