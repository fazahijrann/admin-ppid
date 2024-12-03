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
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Tampil Permohonan Informasi -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Riwayat Permohonan Informasi
                        </h2>
                    </div>

                    <div class="intro-y overflow-auto mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Nomor</th>
                                    <th class="whitespace-nowrap">Nama Pemohon</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Nomor Permohonan Informasi</th>
                                    <th class="text-center whitespace-nowrap">Kategori Memperoleh</th>
                                    <th class="text-center whitespace-nowrap">Kategori Salinan</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                    <th class="text-center whitespace-nowrap">Tanggal Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr class="intro-x">
                                        <td>
                                            <div class="ml-4">
                                                {{ $loop->iteration }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="font-medium whitespace-nowrap">
                                                {{ $user->pemohon->nama }}
                                            </div>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                                {{ $user->pemohon->email }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $user->pemohon->nik }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->no_permohonan_informasi }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->kategoriMemperoleh->jenis_memperoleh }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->kategoriSalinan->jenis_salinan }}
                                        </td>
                                        <td class="text-center">
                                            <div
                                                class="btn {{ $user->btnPenerimaan }}{{ $user->btnKeputusan }} cursor-default w-full">
                                                <i data-lucide="{{ $user->iconPenerimaan }}{{ $user->iconKeputusan }}"
                                                    class="mr-2"></i>
                                                <p class="w-full">
                                                    @if ($user->tandaBuktiPenerimaan->status === 'Diteruskan')
                                                        {{ $user->tandaBuktiPenerimaan->tandaKeputusan->status ?? '' }}
                                                    @else
                                                        {{ $user->tandaBuktiPenerimaan->status }}
                                                    @endif
                                                </p>
                                            </div>
                                            {{-- <div
                                                class="flex items-center justify-center {{ $user->statusKeputusan }}{{ $user->statusPenerimaan }}">
                                                <i data-lucide="{{ $user->iconPenerimaan }}{{ $user->iconKeputusan }}"
                                                    class="w-4 h-4 "></i>
                                                <p class="text-center ml-2">
                                                    @if ($user->tandaBuktiPenerimaan->status === 'Diteruskan')
                                                        {{ $user->tandaBuktiPenerimaan->tandaKeputusan->status ?? '' }}
                                                    @else
                                                        {{ $user->tandaBuktiPenerimaan->status }}
                                                    @endif
                                                </p>
                                            </div> --}}
                                        </td>
                                        <td class="text-center">
                                            @if (optional($user->tandaBuktiPenerimaan->tandaKeputusan)->tgl_keputusan === null)
                                                {{ optional($user->tandaBuktiPenerimaan)->tgl_penerimaan ?? 'Tanggal tidak tersedia' }}
                                            @else
                                                {{ optional($user->tandaBuktiPenerimaan->tandaKeputusan)->tgl_keputusan }}
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- PAGINATION -->
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                        <nav class="w-full sm:w-auto sm:mr-auto">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4"
                                            data-lucide="chevrons-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4"
                                            data-lucide="chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item active"> <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">...</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4"
                                            data-lucide="chevron-right"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"> <i class="w-4 h-4"
                                            data-lucide="chevrons-right"></i> </a>
                                </li>
                            </ul>
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div>
                    <!-- PAGINATION END -->
                </div>
                <!-- END: Tampil Pemohon Informasi -->


            </div>


        </div>
        <!-- END: Content -->
    </div>
</x-app-layout>
