<!-- BEGIN: Modal Content -->
@foreach ($data as $user)
    {{-- Modal Untuk Pejabat Memberikan Keputusan Permohonan Informasi --}}
    <div id="modal-keb-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <p class="font-medium text-base mr-1">
                        Tanggapan Keberatan
                        <a href="{{ route('keberatan.pdf', $user->no_keberatan_informasi) }}" target="_blank"
                            class="group hover:text-blue-800 hover:underline">
                            {{ $user->no_keberatan_informasi }}
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
                <form action="{{ route('keberatan.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body space-y-2">
                        <!-- Tanggapan Atasan PPID atas Keberatan -->
                        <div>
                            <label for="keterangan" class="form-label">Tanggapan PPID atas Keberatan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control pt-1 pl-2 h-32" placeholder="Input Tanggapan"></textarea>
                        </div>


                        <!-- Keputusan Atasan PPID with Checkboxes -->
                        <div>
                            <label for="keputusan_atasan" class="form-label">Keputusan
                                <span class="text-red-800">Pilih Salah Satu*</span>
                            </label>

                            <!-- Checkbox 1: Menolak keberatan pemohon -->
                            <div class="form-check mt-2">
                                <input id="keputusan_1" class="form-check-input" type="checkbox" name="keputusan_atasan"
                                    value="01110100">
                                <label class="form-check-label" for="keputusan_1">
                                    Menolak keberatan pemohon
                                </label>
                            </div>

                            <!-- Checkbox 2: Memberikan sebagaian informasi yang dimohonkan -->
                            <div class="form-check mt-2">
                                <input id="keputusan_2" class="form-check-input" type="checkbox" name="keputusan_atasan"
                                    value="01110011">
                                <label class="form-check-label" for="keputusan_2">
                                    Memberikan sebagaian informasi yang dimohonkan
                                </label>
                            </div>

                            <!-- Checkbox 3: Memberikan informasi yang dimohonkan pemohon -->
                            <div class="form-check mt-2">
                                <input id="keputusan_3" class="form-check-input" type="checkbox" name="keputusan_atasan"
                                    value="01100010">
                                <label class="form-check-label" for="keputusan_3">
                                    Memberikan informasi yang dimohonkan pemohon
                                </label>
                            </div>

                            <!-- Additional Checkbox: Lainnya -->
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="input_radio" name="keputusan_atasan"
                                    value="lainnya">
                                <label class="form-check-label" for="input_radio">
                                    Lainnya
                                </label>
                            </div>

                            <!-- Hidden by default (Will be shown when 'Lainnya' is selected) -->
                            <div id="input_lainnya" style="display: none;" class="mt-2">
                                <label for="regular-form-1" class="form-label">Keputusan lainnya</label>
                                <input id="regular-form-1" name="keputusan_atasan_lainnya" type="text"
                                    class="form-control" placeholder="Tulis Keputusan">
                            </div>
                        </div>


                        <!-- Input Waktu Penyediaan -->
                        <div class="mt-1">
                            <label for="waktu" class="form-label">Jangka Waktu</label>
                            <input id="waktu" type="date" name="waktu" class="form-control" placeholder=""
                                required>
                        </div>
                    </div>

                    <!-- BUTTON FOOTER -->
                    <div class="modal-footer flex justify-end space-x-2">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary">Batal</button>
                        <button type="submit" name="action" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- BEGIN: Modal Content -->
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputField = document.getElementById('input_lainnya');
            const radioButton = document.getElementById('input_radio');

            inputField.style.display = 'none';

            radioButton.addEventListener('change', function() {
                if (radioButton.checked) {
                    inputField.style.display = 'block';
                }
            });

            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                if (radioButton.checked && !document.getElementById('regular-form-1').value) {
                    // Prevent form submission if "Lainnya" is selected but no value is entered
                    e.preventDefault();
                    alert('Please provide a custom decision.');
                }
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputField = document.getElementById('input_lainnya');
            const checkBox = document.getElementById('input_radio');

            inputField.style.display = 'none';

            checkBox.addEventListener('change', function() {
                if (checkBox.checked) {
                    inputField.style.display = 'block';
                } else {
                    inputField.style.display = 'none';
                }
            });
        });
    </script>
@endforeach
<!-- END: Modal Content -->
