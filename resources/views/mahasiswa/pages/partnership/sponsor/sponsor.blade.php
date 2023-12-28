@extends('mahasiswa.layout.basetemplate')
@section('content')
<div class="bg-gray-50 sm:py-16 lg:py-24 ">
    <div class="selection:text-[#F7981D] px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">

        <div class="text-header">
            Sponsorship</span>
        </div>

        <div class="gallery-container grid max-w-md grid-cols-1 gap-6 mx-auto mt-8 lg:mt-16 lg:grid-cols-3 lg:max-w-full">
            @foreach($photos as $photo)
            @if ($photo && $photo->profile && $photo->profile->photo_account)
            @php
            $jumlahPeserta = $photo->profile->jumlah_peserta;
            @endphp
            @if ($jumlahPeserta === auth()->user()->profile->jumlah_peserta)
            <div class="galery-item overflow-hidden bg-white rounded-tl-3xl shadow">
                <div class="p-5 aspect-w-4 aspect-h-3">
                    <div class="relative ">
                        <a href="{{ route('details.show-page', ['id' => $photo->id]) }}" title="" class="block aspect-w-full h-full">
                            <img class="object-cover w-full max-h-72 rounded-tl-2xl" src="{{ asset('storage/' . $photo->profile->photo_account) }}" alt="" />
                        </a>
                    </div>
                    <!-- <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase"> {{$photo->profile->alamat}} </span> -->
                    <p class="mt-5 text-2xl font-semibold">
                        <a href="#" title="" class="text-black"> {{$photo->profile->nama_perusahaan}}
                        </a>
                    </p>
                    <p class="mt-4 text-base text-gray-600">{{$photo->profile->deskripsi}}</p>
                    <a href="{{ route('details.show-page', ['id' => $photo->id]) }}" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                        Detail Sponsor
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection