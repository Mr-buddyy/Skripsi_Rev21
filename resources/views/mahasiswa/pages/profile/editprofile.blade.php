@extends('mahasiswa.layout.basetemplate')
@section('content')
<form id="form" action="editprofil" method="POST" class="max-w-[1240px] mx-auto px-4 ease-soft-in-out relative h-full transition-all duration-200 pt-20" enctype="multipart/form-data">
    @csrf
    <div class="dark:shadow-md dark:shadow-white bg-white my-4 p-10 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class=" border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Profil</h2>
            <!-- <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
            <!-- name -->
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="name" class="text-label-form">Username</label>
                    <div class="mt-2.5 relative ">
                        <input type=" text" name="name" id="name" autocomplete="name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600" placeholder="Masukkan Username">
                    </div>
                </div>

                <!-- email address -->
                <div class="sm:col-span-3">
                    <label for="email" class="text-label-form">Alamat Email</label>
                    <div class="mt-2.5 relative ">
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600" placeholder="Masukkan Email">
                    </div>
                </div>


                <!-- alamat -->
                <div class="col-span-full">
                    <label for="about" class="text-label-form">Alamat Kampus</label>
                    <div class="mt-2">
                        <textarea id="about" name="about" rows="3" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Tulis alamat lengkap kampus anda</p>
                </div>
                <!-- <div class="sm:col-span-4">
                    <label for="country" class="text-label-form">Alamat</label>
                    <div class="mt-2">
                        <select id="country" name="alamat" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option>United States</option>
                            <option>Canada</option>
                            <option>Mexico</option>
                        </select>
                    </div>
                </div> -->

                <!-- photo -->
                <div class="col-span-full">
                    <label for="photo" class="text-label-form">Foto Profil</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                        </svg>
                        <input type="file" class="form-control" name="photo_account">
                    </div>
                    @error('photo_account')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- end photo -->

                <!-- cover photo -->
                <div class="col-span-full">
                    <label for="cover-photo" class="text-label-form">Foto Cover</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Unggah foto cover</span>
                                    <input id="file-upload" name="photo_cover" type="file" class="sr-only">
                                </label>
                                <!-- <p class="pl-1">or drag and drop</p> -->
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF</p>
                        </div>
                    </div>
                </div>
                <!-- end cover photo -->
            </div>
        </div>

        <!-- informasi event -->
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Informasi Event</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Informasi Event akan ditampilkan kepada akun sponsor</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <!-- nama universitas -->
                <div class="sm:col-span-3">
                    <label for="first-name" class="text-label-form">Nama Universitas</label>
                    <div class="mt-2">
                        <input type="text" name="nama_universitas" id="first-name" autocomplete="given-name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600">
                    </div>
                </div>
                <!-- end universitas -->

                <!-- nomor telepon -->
                <div class="sm:col-span-3">
                    <label for="last-name" class="text-label-form">Nomer Telepon</label>
                    <div class="mt-2">
                        <input type="text" name="telpon" id="last-name" pattern="[0-9]{11,13}" autocomplete="family-name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600">
                        @error('telpon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- end nomor telepon -->

                <!-- desc event -->
                <div class="col-span-full">
                    <label for="about" class="text-label-form">Deskripsi Event</label>
                    <div class="mt-2">
                        <textarea id="about" name="deskripsi" rows="3" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Deskripsikan tentang event anda</p>
                </div>
                <!-- end event -->

                <!-- kriteria -->
                <div class="sm:col-span-3">
                    <label for="jumlah_peserta" class="text-label-form">Kriteria Jumlah Peserta</label>
                    <div class="mt-2">
                        <select id="jumlah_peserta" name="jumlah_peserta" autocomplete="country-name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-blue-600 caret-blue-600">
                            <option value="" disabled selected class="text-gray-500">Kriteria</option>
                            <option value="<50">
                                < 50 Peserta</option>
                            <option value="50-100"> 50-100 Peserta</option>
                            <option value="100-200">100-200 Peserta</option>
                            <option value="200-500">200-500 Peserta</option>
                            <option value="500-1000">500-1000 Peserta</option>
                            <option value=">1000"> >1000 Peserta</option>
                        </select>
                    </div>
                </div>
                <!-- end kriteria -->
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a type="button" class="text-sm font-semibold leading-6 text-gray-900" href='/profile'>Batal</a>
            <div class="rounded-md bg-color-system text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <button type="submit" class="px-3 py-2 ">Simpan</button>
            </div>
        </div>
    </div>

</form>
</div>
@endsection