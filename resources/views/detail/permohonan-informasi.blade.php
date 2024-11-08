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
                <div class="intro-y box">

                    <div id="input" class="p-5">
                        <div class="preview">
                            <div>
                                <label for="regular-form-1" class="form-label">Input Text</label>
                                <input id="regular-form-1" type="text" class="form-control" placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-1" class="form-label">Input Text</label>
                                <input id="regular-form-1" type="text" class="form-control" placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-1" class="form-label">Input Text</label>
                                <input id="regular-form-1" type="text" class="form-control" placeholder="Input text">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-1" class="form-label">Input Text</label>
                                <input id="regular-form-1" type="text" class="form-control" placeholder="Input text">
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END: Input -->

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END: Content -->
    </div>
</x-app-layout>
