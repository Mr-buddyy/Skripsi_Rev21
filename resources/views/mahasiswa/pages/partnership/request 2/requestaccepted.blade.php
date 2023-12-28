@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')
<div class=" my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <h1 class="font-medium text-3xl">{{$partnership->sponsor->profile->nama_perusahaan}}</h1>
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
    </div>
    @if($partnership->mou != null && $partnership->pengirim == 'sponsor')
    <p class="text-gray-600 mt-6">Permintaan kerja sama anda telah diterima oleh pihak {{ $partnership->sponsor->profile->nama_perusahaan ?? '-' }}</p>
    <!-- <form method="POST" enctype="multipart/form-data"> -->
    @csrf
    <div class="flex flex-col mt-8 gap-4"> <!-- grid lg:grid-cols-2 -->
        @if(Auth::check())
        <div>
            <h1>PDF Viewer</h1>
            <embed src="data:application/pdf;base64,{{ base64_encode($pdfContents) }}" width="800" height="600" type="application/pdf">

        </div>
        <form action="{{ route('sponsor.upload', ['id' => $detail->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-span-full">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Proposal</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <input type="file" class="form-control" name="mou">
                    <!-- <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button> -->
                </div>
            </div>

            <div class="space-x-4 mt-8">
                <div class="btn-primary">
                    <button type="submit" class="px-2">
                        Kirim
                    </button>
                </div>
                <button class="h-[3rem] w-[6rem] text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                    Cancel
                </button>
            </div>
        </form>
        @endif
    </div>
    @else
    <p class="text-gray-600 mt-6">Permintaan kerja sama anda telah diterima oleh pihak {{ $partnership->nama ?? '-' }}. Mohon tunggu untuk kelanjutannya</p>
    @endif

    <!-- </form> -->
</div>
</div>
@endsection