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
                                @if (Auth::user()->role === 'petugas_ppid')
                                    <div class="preview">
                                    @elseif (Auth::user()->role === 'pejabat_ppid')
                                        <div class="preview grid grid-cols-2 gap-x-8">
                                @endif
                                {{-- Form Petugas PPID --}}
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
                                            <input id="file-ktp" type="file" class="form-control" value=""
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="pekerjaan" class="form-label font-medium">Pekerjaan</label>
                                        <input id="pekerjaan" type="text" class="form-control"
                                            value="{{ $data->pemohon->pekerjaan }}" disabled>
                                    </div>
                                </div>

                                {{-- Form Pejabat PPID --}}
                                @if (Auth::user()->role === 'pejabat_ppid')
                                    <div>
                                        <p class="text-lg font-semibold border-b-2">
                                            Detail Permohonan
                                        </p>
                                        <div class="mt-3">
                                            <label for="rincian-informasi" class="form-label font-medium">Rincian
                                                Informasi</label>
                                            <input id="rincian-informasi" type="text" class="form-control"
                                                value="{{ $data->rincian_informasi }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="tujuan-informasi" class="form-label font-medium">Tujuan
                                                Informasi</label>
                                            <input id="tujuan-informasi" type="text" class="form-control"
                                                value="{{ $data->tujuan_informasi }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="kategori-memperoleh" class="form-label font-medium">Kategori
                                                Memperoleh</label>
                                            <input id="kategori-memperoleh" type="text" class="form-control"
                                                value="{{ $data->kategoriMemperoleh->jenis_memperoleh }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="kategori-salinan" class="form-label font-medium">Kategori
                                                Salinan</label>
                                            <input id="kategori-salinan" type="text" class="form-control"
                                                value="{{ $data->kategoriSalinan->jenis_salinan }}" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="keterangan" class="form-label font-medium">Keterangan</label>
                                            <input id="keterangan" type="text" class="form-control"
                                                placeholder="Keterangan untuk pemohon" name="keterangan">
                                        </div>
                                        <div class="mt-3">
                                            <label for="file-upload" class="form-label font-medium">File <span
                                                    class="text-red-600 font-normal text-xs">
                                                    Bila Perlu</span>
                                            </label>
                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" id="file-upload" multiple
                                                        hidden />
                                                </div>
                                                <div class="dz-message" data-dz-message>
                                                    <div class="text-lg font-medium">Drop files here or click to
                                                        upload.
                                                    </div>
                                                    <div class="text-slate-500"> This is just a demo dropzone. Selected
                                                        files are <span class="font-medium">not</span> actually
                                                        uploaded.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-5 intro-y">
                                @if (Auth::user()->role === 'petugas_ppid')
                                    <button type="submit" name="action" value="lanjutkan"
                                        class="btn btn-primary">Lanjutkan</button>
                                    <button type="submit" name="action" value="batal"
                                        class="btn btn-danger ml-3">Kembalikan Pemohonan</button>
                                @elseif (Auth::user()->role === 'pejabat_ppid')
                                    <button type="submit" name="action" value="terima"
                                        class="btn btn-primary">Terima
                                        Permohonan</button>
                                    <button type="submit" name="action" value="tolak"
                                        class="btn btn-danger ml-3">Tolak Permohonan</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
