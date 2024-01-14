@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')

<div class=" my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <h1 class="font-medium text-3xl">Sedap Sentosa</h1>
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
    </div>
    <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p>
    <!-- <form method="POST" enctype="multipart/form-data"> -->
    @csrf
    <div class=" mt-8 grid lg:grid-cols-2 gap-4">
        <div>
            <label for="name" class="text-sm text-gray-700 block mb-1 font-medium"> Nama</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->nama ?? '-' }}</p>
        </div>
        <div>
            <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Email</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->email ?? '-' }}</p>
        </div>
        <div>
            <label for="job" class="text-sm text-gray-700 block mb-1 font-medium">Universitas</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->universitas ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Nomor Telpon</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->telpon ?? '-' }}</p>
        </div>
        <div>
            <label for="brithday" class="text-sm text-gray-700 block mb-1 font-medium">Deskripsi</label>
            <p class="py-1 text-gray-700 w-full">{{ $partnership->deskripsi ?? '-' }}</p>
        </div>
    </div>
    <!-- </form> -->
</div>
</div>
@endsection