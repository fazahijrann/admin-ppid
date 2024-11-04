<x-app-layout>
    <!-- BEGIN: Mobile Menu -->
    <x-mobile-menu />
    <!-- END: Mobile Menu -->

    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <x-side-menu />
        <!-- END: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">

            <!-- BEGIN: Top Bar -->
            <x-topbar />
            <!-- END: Top Bar -->


            <h2 class="intro-y text-lg font-medium mt-10">
                @if (Route::currentRouteName() === 'petugasppid.edit')
                    Kelola Petugas PPID
                @elseif (Route::currentRouteName() === 'pejabatppid.edit')
                    Kelola Pejabat PPID
                @elseif (Route::currentRouteName() === 'pemohon.edit')
                    Kelola Pemohon PPID
                @endif
            </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <!-- BEGIN: Form Layout -->

                    @if (in_array(Route::currentRouteName(), ['petugasppid.edit', 'pejabatppid.edit']))
                        <div class="intro-y box p-5">
                            @if (Route::currentRouteName() === 'petugasppid.edit')
                                <form action="{{ route('petugasppid.update', $user->id) }}" method="POST">
                                @elseif (Route::currentRouteName() === 'pejabatppid.edit')
                                    <form action="{{ route('pejabatppid.update', $user->id) }}" method="POST">
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label sm:w-20">Nama</label>
                                <input id="horizontal-form-1" name="name" type="text" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-20">Email</label>
                                <input id="horizontal-form-2" name="email" type="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-3" class="form-label sm:w-20">Password</label>
                                <input id="horizontal-form-3" name="password" type="password" class="form-control"
                                    placeholder="Password baru">
                            </div>
                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                <x-primary-button
                                    onclick="return confirm('Pastikan semua sudah diisi dengan benar!')">Simpan</x-primary-button>
                            </div>
                            </form>
                            @if (Route::currentRouteName() === 'petugasppid.edit')
                                <form action="{{ route('petugasppid.destroy', ['petugasppid' => $user->id]) }}"
                                    method="POST" class="mt-3">
                                @elseif (Route::currentRouteName() === 'pejabatppid.edit')
                                    <form action="{{ route('pejabatppid.destroy', ['pejabatppid' => $user->id]) }}"
                                        method="POST" class="mt-3">
                            @endif
                            @csrf
                            @method('DELETE')
                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus akun ini?')">
                                    Hapus Akun
                                </button>
                            </div>
                            </form>
                        </div>
                    @elseif (Route::currentRouteName() === 'pemohon.edit')
                        <div class="intro-y box p-5">
                            @if (Route::currentRouteName() === 'pemohon.edit')
                                <form action="{{ route('pemohon.update', $user->id) }}" method="POST">
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label sm:w-20">Nomor Pendaftaran</label>
                                <input id="horizontal-form-1" name="no_pendaftaran" type="text" class="form-control"
                                    value="{{ old('no_pendaftaran', $user->no_pendaftaran) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-20">Nama</label>
                                <input id="horizontal-form-2" name="name" type="text" class="form-control"
                                    value="{{ old('name', $user->nama) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-3" class="form-label sm:w-20">NIK</label>
                                <input id="horizontal-form-3" name="nik" type="text" class="form-control"
                                    value="{{ old('nik', $user->nik) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-4" class="form-label sm:w-20">Alamat</label>
                                <input id="horizontal-form-4" name="alamat" type="text" class="form-control"
                                    value="{{ old('alamat', $user->alamat) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-5" class="form-label sm:w-20">Nomor Telefon</label>
                                <input id="horizontal-form-5" name="no_tlp" type="text" class="form-control"
                                    value="{{ old('no_tlp', $user->no_tlp) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-6" class="form-label sm:w-20">Email</label>
                                <input id="horizontal-form-6" name="email" type="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-7" class="form-label sm:w-20">Pekerjaan</label>
                                <input id="horizontal-form-7" name="pekerjaan" type="text" class="form-control"
                                    value="{{ old('pekerjaan', $user->pekerjaan) }}" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-8" class="form-label sm:w-20">File KTP</label>
                                <input id="horizontal-form-8" name="file_ktp" type="file" class="form-control"
                                    value="{{ old('file_ktp', $user->file_ktp) }}">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-9" class="form-label sm:w-20">Password</label>
                                <input id="horizontal-form-9" name="password" type="password" class="form-control"
                                    placeholder="Password baru">
                            </div>
                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                <x-primary-button
                                    onclick="return confirm('Pastikan semua sudah diisi dengan benar!')">Simpan</x-primary-button>
                            </div>
                            </form>
                            @if (Route::currentRouteName() === 'pemohon.edit')
                                <form action="{{ route('pemohon.destroy', ['pemohon' => $user->id]) }}"
                                    method="POST" class="mt-3">
                            @endif
                            @csrf
                            @method('DELETE')
                            <div class="sm:ml-20 sm:pl-5 mt-5">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus akun ini?')">
                                    Hapus Akun
                                </button>
                            </div>
                            </form>
                        </div>
                    @endif
                    <!-- END: Form Layout -->
                </div>
            </div>

        </div>
        <!-- END: Content -->
    </div>
</x-app-layout>
