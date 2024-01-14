@extends('mahasiswa.layout.basetemplate')
@section('content')
<div class="py-28 px-16">
    <section class="py-10 bg-white sm:py-16 lg:py-24 rounded-3xl shadow-xl">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="space-x-8 flex justify-end md:mt-0 md:justify-center">
                <a href="{{ route('partnership.mahasiswa-page', ['id' => $detail->id]) }}">
                    <button class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        @if($partnership === 'null')
                        Connect
                        @else
                        Detail
                        @endif
                    </button>
                </a>
                <a href="/chat">
                    <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> Kirim Pesan</button>
                </a>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-white mx-auto rounded-full shadow-2xl inset-x-0 top-0 flex items-center justify-center text-indigo-500">
                    @if($detail->profile->photo_perusahaan == null)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    @else
                    <img class="object-cover w-32 h-32 mx-auto rounded-full" src="{{ asset('storage/' . $detail->profile->photo_perusahaan) }}" alt="" />
                    @endif
                </div>
                <p class="mt-6 text-lg font-semibold text-black">{{$detail->profile->nama_perusahaan ?? '-'}}</p>
                <p class="font-normal text-gray-600">{{$detail->profile->telpon ?? '-'}}</p>
                <p class="font-normal text-gray-600">{{$detail->profile->alamat ?? '-' }}</p>
                <blockquote class="max-w-xl mx-auto mt-7">
                    <p class="text-xl leading-relaxed text-black">“{{$detail->profile->deskripsi}}”</p>
                </blockquote>
            </div>
        </div>
    </section>

</div>
@endsection