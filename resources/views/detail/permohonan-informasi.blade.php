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
                        <div id="input">
                            <div class="p-5">
                                @if ($data->pemohon->id_kategori == 1)
                                    <div class="preview">
                                    @else
                                        <div class="preview grid grid-cols-2 gap-x-8">
                                @endif
                                <div>
                                    <p class="text-lg font-semibold border-b-2">
                                        Identitas Pemohon Informasi
                                    </p>
                                    <div class="mt-3">
                                        <label for="nama-pemohon" class="form-label font-medium">Nama Pemohon</label>
                                        <input id="nama-pemohon" type="text" class="form-control"
                                            value="{{ $data->pemohon->nama }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="nomor-permohonan" class="form-label font-medium">Nomor Permohonan
                                            Informasi</label>
                                        <input id="nomor-permohonan" type="text" class="form-control"
                                            value="{{ $data->no_permohonan_informasi }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="kategori-pemohon" class="form-label font-medium">Kategori
                                            Pemohon</label>
                                        <input id="kategori-pemohon" type="text" class="form-control"
                                            value="{{ $data->pemohon->kategoriPemohon->nama_kategori }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="nik" class="form-label font-medium">NIK</label>
                                        <input id="nik" type="text" class="form-control"
                                            value="{{ $data->pemohon->nik }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="alamat" class="form-label font-medium">Alamat</label>
                                        <input id="alamat" type="text" class="form-control"
                                            value="{{ $data->pemohon->alamat }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="nomor-telepon" class="form-label font-medium">Nomor
                                            Telepon</label>
                                        <input id="nomor-telepon" type="text" class="form-control"
                                            value="{{ $data->pemohon->no_tlp }}" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="email" class="form-label font-medium">Email</label>
                                        <input id="email" type="text" class="form-control"
                                            value="{{ $data->pemohon->email }}" disabled>
                                    </div>
                                    <div class="mt-3 ">
                                        <div>
                                            <label for="file-ktp" class="form-label font-medium">File KTP</label>
                                            <img src="{{ 'http://ppid-baru.test/storage/' . $data->pemohon->file_ktp }}"
                                                alt="File KTP" class="max-w-80 bg-slate-200 p-3 shadow-md rounded-md">

                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="pekerjaan" class="form-label font-medium">Pekerjaan</label>
                                        <input id="pekerjaan" type="text" class="form-control"
                                            value="{{ $data->pemohon->pekerjaan }}" disabled>
                                    </div>
                                </div>
                                @if ($data->pemohon->id_kategori == 2)
                                    <div>
                                        <p class="text-lg font-semibold border-b-2">
                                            Identitas Kuasa
                                        </p>
                                        <div class="mt-3">
                                            <label for="nama-kuasa" class="form-label font-medium">Nama Kuasa</label>
                                            <input id="nama-kuasa" type="text" class="form-control"
                                                value="{{ $data->pemohon->nama_kuasa }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="alamat-kuasa" class="form-label font-medium">Alamat
                                                Kuasa</label>
                                            <input id="alamat-kuasa" type="text" class="form-control"
                                                value="{{ $data->pemohon->alamat_kuasa }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="no-tlp-kuasa" class="form-label font-medium">Nomor Telfon
                                                Kuasa</label>
                                            <input id="no-tlp-kuasa" type="text" class="form-control"
                                                value="{{ $data->pemohon->no_tlp_kuasa }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="sk" class="form-label font-medium">SK Badan
                                                Hukum</label>
                                        </div>
                                        <div class="mt-1">
                                            <a href="{{ 'http://ppid-baru.test/storage/' . $data->pemohon->sk_badanhukum }}"
                                                target="_blank" class="btn btn-primary"> Lihat Dokumen
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="mt-5 intro-y">
                                    <button type="submit" name="action" value="lanjutkan"
                                        class="btn btn-primary">Lanjutkan</button>
                                    <button type="submit" name="action" value="batal"
                                        class="btn btn-danger ml-3">Kembalikan Pemohonan</button>
                                </div>
                            </div>
                        </div>
                </form>
                <!-- END: Input -->
            </div>



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
