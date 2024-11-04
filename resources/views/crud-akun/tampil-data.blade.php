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


            <h2 class="intro-y text-lg font-medium mt-10">
                @if (Route::currentRouteName() === 'petugasppid.index')
                    Data Petugas PPID
                @elseif (Route::currentRouteName() === 'pejabatppid.index')
                    Data Pejabat PPID
                @elseif (Route::currentRouteName() === 'pemohon.index')
                    Data Pemohon PPID
                @endif
            </h2>


            <div class="grid grid-cols-12 gap-6 mt-5">

                <!-- BEGIN: Tambah Petugas -->
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                    @if (Route::currentRouteName() === 'petugasppid.index')
                        <a href="{{ route('petugasppid.create') }}">
                            <button class="btn btn-primary shadow-md mr-2">Tambah Petugas PPID</button>
                        </a>
                    @elseif (Route::currentRouteName() === 'pejabatppid.index')
                        <a href="{{ route('pejabatppid.create') }}">
                            <button class="btn btn-primary shadow-md mr-2">Tambah Pejabat PPID</button>
                        </a>
                    @endif
                    <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                            <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                        </div>
                    </div>
                </div>
                <!-- END: Tambah Petugas -->

                @if (in_array(Route::currentRouteName(), ['petugasppid.index', 'pejabatppid.index']))
                    <!-- BEGIN: Tampil Petugas dan Pejabat -->
                    @foreach ($data as $user)
                        <div class="intro-y col-span-12 md:col-span-6">
                            <div class="box">
                                <div
                                    class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="https://loremflickr.com/200/200?random=1">
                                    </div>
                                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $user->name }}</a>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $user->email }}</div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap  items-center justify-center p-5">
                                    @if (Route::currentRouteName() === 'petugasppid.index')
                                        <a href="{{ route('petugasppid.edit', $user->id) }}">
                                        @elseif (Route::currentRouteName() === 'pejabatppid.index')
                                            <a href="{{ route('pejabatppid.edit', $user->id) }}">
                                    @endif
                                    <button
                                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-medium text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Kelola Pengguna
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- END: Tampil Petugas dan Pejabat -->
                @elseif (Route::currentRouteName() === 'pemohon.index')
                    <!-- BEGIN: Tampil Pemohon -->
                    @foreach ($data as $user)
                        <div class="intro-y col-span-12 md:col-span-6">
                            <div class="box">
                                <div
                                    class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                                            src="https://loremflickr.com/200/200?random=1">
                                    </div>
                                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $user->nama }}</a>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $user->email }}</div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center justify-center p-5">
                                    <a href="{{ route('pemohon.edit', $user->id) }}">
                                        <button
                                            class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-medium text-white hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Kelola Pengguna
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- END: Tampil Pemohon -->
                @endif

                <!-- BEGIN: Pagination -->
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4"
                                        data-lucide="chevrons-right"></i>
                                </a>
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
                <!-- END: Pagination -->
            </div>
        </div>

    </div>

</x-app-layout>
