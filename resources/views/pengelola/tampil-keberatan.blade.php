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

            <!-- INCLUDE: Modal Keberatan -->
            @include('pengelola.partials.modalkeb')


            <!-- BEGIN: Top Bar -->
            <x-topbar />
            <!-- END: Top Bar -->
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Keberatan Informasi -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Permohonan Keberatan Informasi
                        </h2>
                    </div>

                    <div class="intro-y overflow-auto mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Nomor</th>
                                    <th class="whitespace-nowrap">Nama Pemohon</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Nomor Keberatan Informasi</th>
                                    <th class="text-center whitespace-nowrap">Kategori Keberatan</th>
                                    <th class="text-center whitespace-nowrap">Kasus Posisi</th>
                                    <th class="text-center whitespace-nowrap">Status</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
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
                                            {{ $user->no_keberatan_informasi }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->keberatanInformasi->jenis_keberatan }}
                                        </td>
                                        <td class="text-center">
                                            {{ $user->keterangan }}
                                        </td>
                                        <td class="text-center w-20">
                                            <div class="btn btn-pending cursor-default">
                                                <i data-lucide="clock" class="mr-2 w-5"></i>
                                                <p class="text-center">{{ $user->status }}</p>
                                            </div>
                                        </td>

                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                @if (Auth::user()->role === 'petugas_ppid')
                                                    <a class="flex items-center mr-4"
                                                        href="{{ route('keberatan.show', $user->no_keberatan_informasi) }}">
                                                        <i data-lucide="settings" class="w-4 h-4 mr-1"></i>
                                                        Detail </a>
                                                @elseif (Auth::user()->role === 'pejabat_ppid')
                                                    <a class="flex items-center mr-4"
                                                        href="{{ route('keberatan.pdf', $user->no_keberatan_informasi) }}">
                                                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                                        Lihat
                                                    </a>
                                                    <div class="text-center">
                                                        <a href="javascript:;" data-tw-toggle="modal"
                                                            data-tw-target="#modal-keb-{{ $user->id }}"
                                                            class="flex items-center mr-4"><i data-lucide="settings"
                                                                class="w-4 h-4 mr-1"></i>
                                                            Aksi
                                                        </a>
                                                    </div>
                                                @endif
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
                                <!-- Tombol Previous -->
                                @if ($data->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-lucide="chevrons-left"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->url(1) }}"> <i class="w-4 h-4"
                                                data-lucide="chevrons-left"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->previousPageUrl() }}"> <i class="w-4 h-4"
                                                data-lucide="chevron-left"></i> </a>
                                    </li>
                                @endif

                                <!-- Nomor Halaman -->
                                @foreach ($data->links()->elements[0] as $page => $url)
                                    <li class="page-item {{ $page == $data->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                <!-- Tombol Next -->
                                @if ($data->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->nextPageUrl() }}"> <i class="w-4 h-4"
                                                data-lucide="chevron-right"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->url($data->lastPage()) }}"> <i
                                                class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-lucide="chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-lucide="chevrons-right"></i> </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                        <select class="w-20 form-select box mt-3 sm:mt-0" onchange="location = this.value;">
                            <option value="?per_page=10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="?per_page=25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="?per_page=35" {{ request('per_page') == 35 ? 'selected' : '' }}>35</option>
                            <option value="?per_page=50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                    <!-- PAGINATION END -->
                </div>
                <!-- END: Keberatan Informasi -->
            </div>
        </div>
        <!-- END: Content -->
    </div>
</x-app-layout>
