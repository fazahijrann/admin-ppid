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

            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Detail Permohonan
                </h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-5">
                <!-- BEGIN: Input -->
                <form action="{{ route('permohonan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box">
                        <div id="input" class="p-5">
                            <div class="preview">
                                <div>
                                    <label for="nama-pemohon" class="form-label">Nama Pemohon</label>
                                    <input id="nama-pemohon" type="text" class="form-control"
                                        value="{{ $data->pemohon->nama }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="nomor-permohonan" class="form-label">Nomor Permohonan
                                        Informasi</label>
                                    <input id="nomor-permohonan" type="text" class="form-control"
                                        value="{{ $data->no_permohonan_informasi }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="kategori-pemohon" class="form-label">Kategori Pemohon</label>
                                    <input id="kategori-pemohon" type="text" class="form-control"
                                        value="{{ $data->pemohon->kategoriPemohon->nama_kategori }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input id="nik" type="text" class="form-control"
                                        value="{{ $data->pemohon->nik }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input id="alamat" type="text" class="form-control"
                                        value="{{ $data->pemohon->alamat }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
                                    <input id="nomor-telepon" type="text" class="form-control"
                                        value="{{ $data->pemohon->no_tlp }}" disabled>
                                </div>
                                <div class="mt-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="text" class="form-control"
                                        value="{{ $data->pemohon->email }}" disabled>
                                </div>
                                <div class="mt-3 w-1/2">
                                    <div>
                                        <label for="file-ktp" class="form-label">File KTP</label>
                                        <input id="file-ktp" type="file" class="form-control" value=""
                                            disabled>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input id="pekerjaan" type="text" class="form-control"
                                        value="{{ $data->pemohon->pekerjaan }}" disabled>
                                </div>
                            </div>
                            <div class="mt-3 intro-y">
                                <button type="submit" name="action" value="lanjutkan"
                                    class="btn btn-primary">Lanjutkan</button>
                                <button type="submit" name="action" value="batal"
                                    class="btn btn-danger ml-3">Kembalikan Pemohonan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END: Input -->

                {{-- @if (Auth::user()->role === 'pejabat_ppid')
                    <div class="mt-5">
                        <form action="{{ route('permohonan.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="intro-y box">
                                <div id="input" class="p-5">
                                    <div class="preview">
                                        <div>
                                            <label for="nama-pemohon" class="form-label">Nama Pemohon</label>
                                            <input id="nama-pemohon" type="text" class="form-control"
                                                value="{{ $data->pemohon->nama }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="nomor-permohonan" class="form-label">Nomor Permohonan
                                                Informasi</label>
                                            <input id="nomor-permohonan" type="text" class="form-control"
                                                value="{{ $data->no_permohonan_informasi }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="kategori-pemohon" class="form-label">Kategori Pemohon</label>
                                            <input id="kategori-pemohon" type="text" class="form-control"
                                                value="{{ $data->pemohon->kategoriPemohon->nama_kategori }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input id="nik" type="text" class="form-control"
                                                value="{{ $data->pemohon->nik }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input id="alamat" type="text" class="form-control"
                                                value="{{ $data->pemohon->alamat }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="nomor-telepon" class="form-label">Nomor Telepon</label>
                                            <input id="nomor-telepon" type="text" class="form-control"
                                                value="{{ $data->pemohon->no_tlp }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="text" class="form-control"
                                                value="{{ $data->pemohon->email }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="file-ktp" class="form-label">File KTP</label>
                                            <input id="file-ktp" type="file" class="form-control" value=""
                                                disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input id="pekerjaan" type="text" class="form-control"
                                                value="{{ $data->pemohon->pekerjaan }}" disabled>
                                        </div>

                                    </div>
                                    <div class="mt-3 intro-y">
                                        <button type="submit" name="action" value="lanjutkan"
                                            class="btn btn-primary">Lanjutkan</button>
                                        <button type="submit" name="action" value="batal"
                                            class="btn btn-danger ml-3">Kembalikan Pemohonan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                @endif --}}
            </div>


        </div>
    </div>
    </div>
    </div>
    <!-- END: Content -->
    </div>
</x-app-layout>
