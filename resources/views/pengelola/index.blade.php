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
                @if (Auth::user()->role === 'superadmin')
                    <!-- BEGIN: Center Content-->
                    <div class="col-span-12 2xl:col-span-9">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: Perhitungan Super Admin -->
                            <div class="col-span-12 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Statistik Umum
                                    </h2>
                                    <a href="" class="ml-auto flex items-center text-primary"> <i
                                            data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="user" class="report-box__icon text-success"></i>
                                                    <div class="ml-auto">
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPemohon }}
                                                </div>
                                                <div class="text-base text-slate-500 mt-1">Total Pemohon </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="file-text"
                                                        class="report-box__icon text-primary"></i>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPermohonan }}
                                                </div>
                                                <div class="text-base text-slate-500 mt-1">Total Permohonan</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="frown" class="report-box__icon text-warning"></i>
                                                    <div class="ml-auto">
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{ $totalKeberatan }}
                                                </div>
                                                <div class="text-base text-slate-500 mt-1">Total Keberatan</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                        <div class="report-box zoom-in">
                                            <div class="box p-5">
                                                <div class="flex">
                                                    <i data-lucide="bar-chart"
                                                        class="report-box__icon text-pending"></i>
                                                    <div class="ml-auto">
                                                    </div>
                                                </div>
                                                <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPengunjung }}
                                                </div>
                                                <div class="text-base text-slate-500 mt-1">Total Pengunjung Website
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Perhitungan Super Admin -->

                            <!-- BEGIN: Charts -->
                            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Charts
                                    </h2>
                                </div>
                                <div class="intro-y box p-5 mt-5">
                                    <canvas class="mt-3" id="report-pie-chart" height="300"></canvas>
                                    <div class="mt-8 place-items-center">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-success rounded-full mr-3"></div>
                                            <span class="truncate">Total Pemohon</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                            <span class="truncate">Total Permohonan</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                            <span class="truncate">Total Keberatan</span>
                                        </div>
                                        <div class="flex items-center mt-4">
                                            <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                            <span class="truncate">Total Pengunjung Website</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Charts -->
                        </div>
                    </div>
                    <!-- BEGIN: Right Content-->
                    <div class="col-span-12 2xl:col-span-3">
                        <div class="2xl:border-l -mb-10 pb-10">
                            <div class="2xl:pl-6 grid grid-cols-12 gap-6">

                                <!-- BEGIN: Recent Activities -->
                                <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Recent Activities
                                        </h2>
                                        <a href="" class="ml-auto text-primary truncate">Show More</a>
                                    </div>
                                    <div
                                        class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before before:ml-5 before:mt-5">
                                        <div class="intro-x relative flex items-center mb-3">
                                            <div
                                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                    <img alt="Midone - HTML Admin Template"
                                                        src="dist/images/profile-7.jpg">
                                                </div>
                                            </div>
                                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Morgan Freeman</div>
                                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                                </div>
                                                <div class="text-slate-500 mt-1">Has joined the team</div>
                                            </div>
                                        </div>
                                        <div class="intro-x relative flex items-center mb-3">
                                            <div
                                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                    <img alt="Midone - HTML Admin Template"
                                                        src="dist/images/profile-13.jpg">
                                                </div>
                                            </div>
                                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Nicolas Cage</div>
                                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                                </div>
                                                <div class="text-slate-500">
                                                    <div class="mt-1">Added 3 new photos</div>
                                                    <div class="flex mt-2">
                                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                            title="Apple MacBook Pro 13">
                                                            <img alt="Midone - HTML Admin Template"
                                                                class="rounded-md border border-white"
                                                                src="dist/images/preview-3.jpg">
                                                        </div>
                                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                            title="Apple MacBook Pro 13">
                                                            <img alt="Midone - HTML Admin Template"
                                                                class="rounded-md border border-white"
                                                                src="dist/images/preview-5.jpg">
                                                        </div>
                                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                            title="Nikon Z6">
                                                            <img alt="Midone - HTML Admin Template"
                                                                class="rounded-md border border-white"
                                                                src="dist/images/preview-13.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="intro-x text-slate-500 text-xs text-center my-4">12
                                            November
                                        </div>
                                        <div class="intro-x relative flex items-center mb-3">
                                            <div
                                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                                <div
                                                    class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                    <img alt="Midone - HTML Admin Template"
                                                        src="dist/images/profile-6.jpg">
                                                </div>
                                            </div>
                                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Angelina Jolie</div>
                                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                                </div>
                                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                                        href="">Sony A7 III</a>
                                                    price and description</div>
                                            </div>
                                        </div>
                                        <div class="intro-x relative flex items-center mb-3">
                                            <div
                                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                                <div
                                                    class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                    <img alt="Midone - HTML Admin Template"
                                                        src="dist/images/profile-3.jpg">
                                                </div>
                                            </div>
                                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Arnold Schwarzenegger</div>
                                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                                </div>
                                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                                        href="">Nikon Z6</a>
                                                    description</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Recent Activities -->
                            </div>
                        </div>
                    </div>
                    <!-- END: Right Content-->
                @endif

                @if (Auth::user()->role === 'petugas_ppid')
                    <!-- BEGIN: Perhitungan Petugas PPID -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Statistik Umum Permohonan Informasi
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i
                                    data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <a href="{{ route('permohonan.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="clock" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $permMenunggu }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Permohonan Menunggu</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="corner-up-right"
                                                class="report-box__icon text-success"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $permDiteruskan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Permohonan Diteruskan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="alert-octagon" class="report-box__icon text-danger"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">
                                            {{ $permUlang }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Permohonan Harus Ajukan Ulang</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="bar-chart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPermohonan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Total Permohonan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Statistik Umum Keberatan Permohonan Informasi
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i
                                    data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <a href="{{ route('keberatan.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="clock" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $keberMenunggu }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Keberatan Menunggu</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="corner-up-right"
                                                class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">
                                            {{ $keberDiteruskan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Keberatan Diteruskan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="bar-chart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $totalKeberatan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Total Keberatan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Perhitungan Petugas PPID -->
                @endif

                @if (Auth::user()->role === 'pejabat_ppid')
                    <!-- BEGIN: Perhitungan Petugas PPID -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Statistik Umum Permohonan Informasi
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i
                                    data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <a href="{{ route('permohonan.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="clock" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $permDiproses }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Permohonan Menunggu Proses</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="file-text" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">
                                            {{ $permTerima }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Permohonan Diterima</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="alert-octagon" class="report-box__icon text-danger"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $permTolak }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Permohonan Ditolak</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="bar-chart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPermohonan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Total Permohonan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Statistik Umum Keberatan Permohonan Informasi
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i
                                    data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <a href="{{ route('keberatan.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="clock" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $keberDiproses }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Keberatan Menunggu Proses</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="file-text" class="report-box__icon text-success"></i>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">
                                            {{ $keberSelesai }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Keberatan Selesai</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in cursor-default">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-lucide="bar-chart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">{{ $totalKeberatan }}
                                        </div>
                                        <div class="text-base text-slate-500 mt-1">Total Keberatan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Perhitungan Petugas PPID -->
                @endif
            </div>
        </div>
        <!-- END: Center Content-->



    </div>
    </div>
    <!-- END: Content -->
    </div>
    <script>
        const chartData = {
            totalPermohonan: @json($totalPermohonan),
            totalPengunjung: @json($totalPengunjung),
            totalKeberatan: @json($totalKeberatan),
            totalPemohon: @json($totalPemohon),
        };
        console.log(chartData);
    </script>


</x-app-layout>
