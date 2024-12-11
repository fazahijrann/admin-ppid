<!-- BEGIN: Modal Content -->
@foreach ($data as $user)
    {{-- Modal Untuk Pejabat Memberikan Keputusan Permohonan Informasi --}}
    <div id="modal-aksi-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
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


                <!-- FORM UTAMA -->
                <form action="{{ route('permohonan.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body space-y-4">
                        <!-- Dropdown Sumber Informasi -->
                        <div>
                            <label for="jenis_sumber" class="form-label">Sumber Informasi</label>
                            <select id="jenis_sumber" name="sumber_informasi_id" class="form-select dropdown"
                                aria-label="Pilih Sumber Informasi">
                                <option value="" selected disabled>Pilih OPD</option>
                                @foreach ($sumbers as $opd)
                                    <option value="{{ $opd->id }}"
                                        {{ old('sumber_informasi_id') == $opd->id ? 'selected' : '' }}>
                                        {{ $opd->jenis_sumber }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Biaya Informasi -->
                        <div>
                            <label for="biaya_informasi" class="form-label">Biaya Informasi</label>
                            <div class="input-group">
                                <div id="input-group-biaya" class="input-group-text">Rp.</div>
                                <input id="biaya_informasi" name="biaya_informasi" type="number" class="form-control"
                                    placeholder="Biaya Informasi" aria-label="biaya"
                                    aria-describedby="input-group-biaya">
                            </div>
                        </div>

                        <!-- Dropdown Jenis Informasi -->
                        <div>
                            <label for="jenis_informasi" class="form-label">Jenis Informasi Yang Tersedia</label>
                            <select id="jenis_informasi" name="jenis_informasi_id" class="form-select">
                                <option value="" selected disabled>Pilih Jenis Informasi</option>
                                @foreach ($jenisinf as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_informasi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Input Waktu Penyediaan -->
                        <div>
                            <label for="waktu" class="form-label">Waktu Penyediaan (hari)</label>
                            <input id="waktu" type="number" name="waktu" class="form-control"
                                placeholder="Input Jumlah Hari">
                        </div>

                        <!-- Input Keterangan -->
                        <div>
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control pt-1 pl-2 h-32" placeholder="Keterangan"></textarea>
                        </div>
                    </div>

                    <!-- BUTTON FOOTER -->
                    <div class="modal-footer flex justify-end space-x-2">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary">Batal</button>
                        <button type="button" data-tw-toggle="modal" data-tw-target="#modalTolak{{ $user->id }}"
                            class="btn btn-danger">
                            Tolak
                        </button>
                        <button type="submit" name="action" value="terima" class="btn btn-primary">Terima</button>

                    </div>
                </form>

                <!-- MODAL UNTUK "TOLAK" -->
                <div id="modalTolak{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="{{ route('permohonan.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-body space-y-4">
                                    <!-- Dropdown Keterangan Penolakan -->
                                    <div>
                                        <label for="keterangan_tolak" class="form-label">Keterangan</label>
                                        <select id="keterangan_tolak" name="keterangan" class="form-select dropdown"
                                            aria-label="Keterangan Penolakan">
                                            <option value="" selected disabled>Keterangan Penolakan</option>
                                            <option value="01101011">Informasi yang diminta belum dikuasai</option>
                                            <option value="01100100">Informasi yang diminta belum didokumentasikan
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Input Waktu Penyediaan -->
                                    <div>
                                        <label for="waktu_tolak" class="form-label">Waktu Penyediaan</label>
                                        <input id="waktu_tolak" type="text" name="waktu" class="form-control"
                                            placeholder="Isi dengan keterangan waktu yang jelas untuk menyediakan informasi yang diminta">
                                    </div>
                                </div>
                                <!-- Footer Modal -->
                                <div class="modal-footer flex justify-end space-x-2">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary">Batal</button>
                                    <button type="submit" name="action" value="tolak"
                                        class="btn btn-danger">Tolak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: Modal Content -->


    </div>

    {{-- <script>
        $(document).ready(function() {
            // Mengaktifkan Select2 dengan pencarian langsung
            $('#jenis_sumber').select2({
                placeholder: "Pilih Sumber Informasi", // Menampilkan placeholder
                allowClear: true, // Menyediakan opsi untuk menghapus pilihan
                minimumResultsForSearch: 0 // Menampilkan kotak pencarian selalu
            });
        });
    </script>

    <script>
        // Fungsi untuk menampilkan dropdown
        document.getElementById('dropdownButton').addEventListener('click', function() {
            const dropdownList = document.getElementById('dropdownList');
            dropdownList.style.display = (dropdownList.style.display === 'none') ? 'block' : 'none';
        });

        // Fungsi untuk menutup dropdown ketika opsi dipilih
        const items = document.querySelectorAll('.dropdown-item');
        items.forEach(item => {
            item.addEventListener('click', function(e) {
                document.getElementById('dropdownButton').textContent = e.target.textContent;
                document.getElementById('dropdownList').style.display = 'none';
            });
        });

        // Fungsi untuk menyaring opsi berdasarkan pencarian
        function filterOptions() {
            const searchValue = document.getElementById('search_input').value.toLowerCase();
            const items = document.querySelectorAll('.dropdown-item');
            items.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                item.style.display = itemText.includes(searchValue) ? 'block' : 'none';
            });
        }
    </script> --}}
@endforeach
<!-- END: Modal Content -->
