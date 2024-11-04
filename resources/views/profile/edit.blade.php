<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

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
            {{-- <a href="/"
                class="intro-y inline-flex items-center mt-8 pl-2 pr-3 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 gap-2">
                <i data-lucide="play" class="rotate-180"></i>
                Kembali
            </a> --}}
            <div class="intro-y flex items-center mt-4">
                <h2 class="text-lg font-medium mr-auto">
                    Kelola Profil
                </h2>
            </div>
            <!-- BEGIN: Profile Info -->
            <div class="-intro-y box px-5 pt-5 mt-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="{{ asset('img/logopemkot.png') }}">
                        </div>
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                                {{ Auth::user()->name }}</div>
                            <div class="text-slate-500">PPID Bogor</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Profile Info -->

            <!-- BEGIN: Profile Edit -->
            <div class="tab-content mt-5">
                <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="-intro-x box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-3">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                        </div>
                        <div class="intro-x box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-3">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box col-span-12 max-w-lg mx-auto">
                            <div class="flex items-center justify-center text-center px-5 py-5 sm:py-3">
                                <div class="max-w-xl">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Profile Edit -->
        <!-- END: Content -->

        <!-- START: Delete Account Modal -->
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}" />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
        <!-- END: Delete Account Modal -->
    </div>
</x-app-layout>
