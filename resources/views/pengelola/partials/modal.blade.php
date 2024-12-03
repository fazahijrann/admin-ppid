<!-- BEGIN: Modal Content -->
@foreach ($data as $user)
    <div id="modal-aksi{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <p class="font-medium text-base mr-1">
                        Terima/Tolak Permohonan
                        <a href="{{ route('permohonan.pdf', $user->no_permohonan_informasi) }}" target="_blank"
                            class="group hover:text-blue-800 hover:underline">
                            {{ $user->no_permohonan_informasi }}
                        </a>
                    <h6 class="text-red-800">
                        Klik nomor untuk lihat dokumen*
                    </h6>
                    </p>
                    <div class="dropdown
                                sm:hidden"> <a
                            class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"
                                class="w-5 h-5 text-slate-500"></i>
                        </a>

                    </div>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form action="{{ route('permohonan.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label for="jenis_sumber" class="form-label">Sumber Informasi</label>
                            <input id="jenis_sumber" name="jenis_sumber" class="form-control"
                                placeholder="Sumber Informasi" type="text">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="biaya_informasi" class="form-label">Biaya
                                Informasi</label>
                            <div class="input-group">
                                <div id="input-group-biaya" class="input-group-text">Rp.</div>
                                <input id="biaya_informasi" name="biaya_informasi" type="number" class="form-control"
                                    placeholder="Biaya Informasi" aria-label="biaya"
                                    aria-describedby="input-group-biaya">
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="jenis_informasi" class="form-label">Jenis Informasi</label>
                            <input id="jenis_informasi" name="jenis_informasi" type="text" class="form-control"
                                placeholder="Jenis Informasi">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control pt-1 pl-2" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">

                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                            Batal
                        </button>
                        <button type="submit" name="action" value="tolak" class="btn btn-danger w-20 mr-1">
                            Tolak
                        </button>
                        <button type="submit" name="action" value="terima" class="btn btn-primary w-20">
                            Terima
                        </button>
                    </div>
                    <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- END: Modal Content -->
