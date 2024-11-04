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
                @if (Route::currentRouteName() === 'petugasppid.create')
                    Tambah Petugas PPID
                @elseif (Route::currentRouteName() === 'pejabatppid.create')
                    Tambah Pejabat PPID
                @endif
            </h2>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-6">
                    <!-- BEGIN: Form Layout -->
                    <div class="intro-y box p-5">
                        @if (Route::currentRouteName() === 'petugasppid.create')
                            <form action="{{ route('petugasppid.store') }}" method="POST">
                            @elseif (Route::currentRouteName() === 'pejabatppid.create')
                                <form action="{{ route('pejabatppid.store') }}" method="POST">
                        @endif
                        @csrf
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Nama</label>
                            <input id="horizontal-form-1" name="name" type="text" class="form-control"
                                placeholder="Nama Pejabat" required>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-2" class="form-label sm:w-20">Email</label>
                            <input id="horizontal-form-2" name="email" type="email" class="form-control"
                                placeholder="email@gmail.com" required>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="horizontal-form-3" class="form-label sm:w-20">Password</label>
                            <input id="horizontal-form-3" name="password" type="password" class="form-control"
                                placeholder="Password" required>
                        </div>
                        <div class="sm:ml-20 sm:pl-5 mt-5">
                            <x-primary-button>Tambah</x-primary-button>
                        </div>
                        </form>
                    </div>
                    <!-- END: Form Layout -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</x-app-layout>
