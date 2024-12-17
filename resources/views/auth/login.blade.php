<x-guest-layout>

    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Logo PPID" class="w-10" src="img/logo-ppid.png">
                        <span class="text-white text-lg ml-3"> PPID Kota Bogor </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                            src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Dashboard Admin PPID
                            <br>
                            Pemerintah Kota Bogor
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70">Pejabat
                            Pengelola
                            Informasi dan Dokumentasi</div>
                    </div>
                </div>
                <!-- END: Login Info -->

                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">


                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Masuk
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Dashboard Admin PPID
                            Pemerintah
                            Kota Bogor</div>


                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="intro-x mt-8">
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="login__input form-control py-3 px-4 block"
                                        type="email" name="email" :value="old('email')" autofocus autocomplete="email"
                                        placeholder="ppid@gmail.com" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="login__input form-control py-3 px-4 block"
                                        type="password" name="password" autocomplete="current_password"
                                        placeholder="********" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                {{-- Captcha | Curently Non Active While Developing -> LoginRequest.php --}}
                                <div class="mt-4">
                                    <x-input-label for="captcha" :value="__('Captcha')"></x-input-label>
                                    <div class="flex">
                                        <img src="{{ captcha_src('math') }}" alt="captcha" id="captcha-image"
                                            class="">
                                        <button type="button" onclick="refreshCaptcha()"
                                            class="btn btn-primary ml-4">&#x21bb;</button>
                                    </div>
                                    <x-text-input id="captcha" name="captcha"
                                        class="login__input form-control py-3 px-4 mt-2 block " type="text"
                                        autocomplete="off" placeholder="Masukkan Captcha" />
                                    <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4 intro-x">
                                    <x-primary-button class="mt-4">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>


        <script>
            function refreshCaptcha() {
                const captchaImage = document.getElementById('captcha-image');
                captchaImage.src = '{{ captcha_src('math') }}' + '?' + Date.now();
            }
        </script>
    </body>

</x-guest-layout>
