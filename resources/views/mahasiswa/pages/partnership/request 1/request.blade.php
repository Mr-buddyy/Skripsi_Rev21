@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')
<div class=" my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <h1 class="font-medium text-3xl">{{$detail->username}}</h1>
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> No Send</a>
        </div>
    </div>
    <p class="text-gray-600 mt-6">{{$detail->profile->deskripsi ?? '-'}}</p>
    <form action="{{ route('partnership.store', ['id' => $detail->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class=" mt-8 grid lg:grid-cols-2 gap-4">
            @if(Auth::check())
            <input type="hidden" name="sponsor_id" value="{{ $detail->sponsor_id }}">
            <div>
                <label for="nama" class="text-label-form"> Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded focus:outline-none focus:border-blue-600 caret-blue-600" value="{{ empty($user) ? '' : $user->username}}" />
                <!-- <input type="text" name="nama" id="nama" class="p-4 bg-gray-100 border border-gray-200 rounded block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ empty($user) ? '-' : $user->username}}" /> -->
                @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="text-label-form">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukkan Email" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded focus:outline-none focus:border-blue-600 caret-blue-600" value="{{ empty($user) ? '' : $user->email}}" />
                <!-- <input type="text" name="email" id="email" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ empty($user) ? '-' : $user->email}}" /> -->
                <small class="block text-gray-500 text-xs mt-1">*Masukkan format email dengan benar</small>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="job" class="text-label-form">Universitas</label>
                <input type="text" name="universitas" id="universitas" placeholder="Masukkan Asal Universitas" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded focus:outline-none focus:border-blue-600 caret-blue-600" value="{{ empty($user->profil) ? '' : $user->profile->nama_universitas}}" />
                <!-- <input type="text" name="universitas" id="job" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ empty($user->profil) ? '' : $user->profile->nama_universitas}}" placeholder="Masukkan Asal Universitas" /> -->
                @error('universitas')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="telpon" class="text-label-form">Nomor Telpon</label>
                <input type="text" name="telpon" id="telpon" pattern="[0-9]{11,13}" placeholder="Masukkan Nomor Telpon" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded focus:outline-none focus:border-blue-600 caret-blue-600" value="{{ empty($user->profil) ? '' : $user->profile->telefone}}" />
                <!-- <input type="text" name="telpon" id="telpon" pattern="[0-9]{11,13}" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ empty($user->profil) ? '' : $user->profile->telefone}}" placeholder="Masukkan Nomor Telpon" /> -->
                <small class="block text-gray-500 text-xs mt-1">*Masukkan Hanya Angka 11-13 digit</small>
                @error('telpon')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="deskripsi" class="text-label-form">Deskripsi Acara</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded focus:outline-none focus:border-blue-600 caret-blue-600" value="{{ empty($user->profil) ? '' : $user->profile->deskripsi}}" placeholder="Masukkan Deskripsi Acara"> </textarea>
                @error('deskripsi')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-full">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Proposal</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <input type="file" class="form-control" name="proposal">
                    <!-- <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button> -->
                </div>
                @error('proposal')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            @endif
        </div>
        <div class="space-x-4 mt-8">
            <button type="submit" class="text-white font-semibold text-base px-10 py-4 rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 ">
                Kirim
            </button>
            <button type="button" onclick="window.location.href='/'" class="px-10 py-4  bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                Cancel
            </button>
        </div>
    </form>
</div>
</div>
@endsection