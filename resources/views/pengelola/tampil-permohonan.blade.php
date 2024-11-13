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
                                Permohonan Informasi
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
                                        <th class="text-center whitespace-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $user)
                                        <tr class="intro-x">
                                            <td>
                                                <div class="ml-4">{{ $loop->iteration }}</div>
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
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-pending">
                                                    <i data-lucide="clock" class="w-4 h-4 "></i>
                                                    <p class="text-center ml-2">
                                                        {{ $user->tandaBuktiPenerimaan->status }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-4"
                                                        href="{{ route('permohonan.show', $user->no_permohonan_informasi) }}">
                                                        <i data-lucide="settings" class="w-4 h-4 mr-1"></i>
                                                        Detail </a>
                                                    <a class="flex items-center text-danger" href=""> <i
                                                            data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                                        Delete </a>
                                                </div>
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
                                                data-lucide="chevrons-left"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-lucide="chevron-left"></i> </a>
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
                                                data-lucide="chevron-right"></i> </a>
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
