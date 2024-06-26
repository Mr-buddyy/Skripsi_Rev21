@extends('mahasiswa.layout.basetemplate')
@section('content')
@include('mahasiswa.pages.partnership.layout.headertemplate')
<div class="my-10 p-8 rounded-3xl shadow-2xl bg-white">
    <div class="flex flex-row justify-between">
        <h1 class="font-medium text-3xl">Sedap Sentosa</h1>
        <div>
            <a class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> {{ $partnership->status ?? '-' }}</a>
        </div>
    </div>
    @if($partnership->lpj == null )
    @if($partnership->mou != null )

    <div class="flex flex-col mt-8 gap-4"> <!-- grid lg:grid-cols-2 -->
        @if(Auth::check())
        <form action="{{ route('photoevidence.store', ['id' => $a]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-span-full">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Upload LPJ</label>
                <div class="mt-2 flex items-center gap-x-3">
                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                    </svg>
                    <input type="file" class="form-control" name="lpj">
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

    @else
    <!-- Modal content -->
    <div class="relative p-4 text-center dark:bg-gray-800 sm:p-5">
        <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
            <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Success</span>
        </div>
        <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Kerja Sama telah berhasil</p>
        <button data-modal-toggle="successModal" type="button" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900">
            Continue
        </button>
    </div>
    @endif

</div>
</div>
@endsection