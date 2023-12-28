@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')
<div class=" my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <!-- nama sponsor -->
        <h1 class="font-medium text-3xl">{{$partnership->sponsor->username}}</h1>
        <!-- end nama sponsor -->
        <!-- status -->
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
        <!-- end status -->
    </div>
    <!-- deskripsi -->
    <p class="text-gray-600 mt-6">{{$partnership->deskripsi}}</p>
    <!-- end deskripsi -->
    @csrf
    <div class=" mt-8 grid lg:grid-cols-2 gap-4">
        @if(Auth::check())
        <!-- nama partnership -->
        <div>
            <label for="name" class="text-label-form"> Nama</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->nama ?? '-' }}</p>
        </div>
        <div>
            <label for="email" class="text-label-form">Email</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->email ?? '-' }}</p>
        </div>
        <div>
            <label for="job" class="text-label-form">Universitas</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->universitas ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-label-form">Nomor Telpon</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->telpon ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-label-form">Deskripsi</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->deskripsi ?? '-' }}</p>
        </div>

        @endif
    </div>
    <!-- </form> -->
</div>
</div>
@endsection