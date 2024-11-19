<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon "></i>
        </div>
        <a class="notification sm:hidden" href=""> <i data-lucide="search" class="notification__icon "></i> </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-success/20 text-success flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="inbox"></i>
                        </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="users"></i>
                        </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div
                            class="w-8 h-8 bg-primary/10 text-primary/80 flex items-center justify-center rounded-full">
                            <i class="w-4 h-4" data-lucide="credit-card"></i>
                        </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="dist/images/profile-14.jpg">
                        </div>
                        <div class="ml-3">Russell Crowe</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            russellcrowe@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="dist/images/profile-3.jpg">
                        </div>
                        <div class="ml-3">Al Pacino</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            alpacino@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="dist/images/profile-7.jpg">
                        </div>
                        <div class="ml-3">Sylvester Stallone</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            sylvesterstallone@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone - HTML Admin Template" class="rounded-full"
                                src="dist/images/profile-8.jpg">
                        </div>
                        <div class="ml-3">Morgan Freeman</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">
                            morganfreeman@left4code.com</div>
                    </a>
                </div>
                <div class="search-result__content__title">Products</div>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-8.jpg">
                    </div>
                    <div class="ml-3">Nike Air Max 270</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Sport &amp;
                        Outdoor</div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-14.jpg">
                    </div>
                    <div class="ml-3">Sony A7 III</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Photography
                    </div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-5.jpg">
                    </div>
                    <div class="ml-3">Oppo Find X2 Pro</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Smartphone
                        &amp; Tablet</div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/preview-9.jpg">
                    </div>
                    <div class="ml-3">Samsung Q90 QLED TV</div>
                    <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">Electronic
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Search -->

    <!-- BEGIN: Notifications -->
    {{-- <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
            aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon "></i>
        </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
                <div class="cursor-pointer relative flex items-center ">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full"
                            src="dist/images/profile-14.jpg">
                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">Russell
                                Crowe</a>
                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM
                            </div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief,
                            Lorem Ipsum is not simply random text. It has roots in a piece of classical
                            Latin literature from 45 BC, making it over 20</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-3.jpg">
                        <div
                            class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM
                            </div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">There are many variations
                            of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomi</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                        <div
                            class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">Sylvester
                                Stallone</a>
                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM
                            </div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">There are many variations
                            of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomi</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-8.jpg">
                        <div
                            class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">Morgan
                                Freeman</a>
                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM
                            </div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy
                            text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry&#039;s standard dummy text ever since the 1500</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                        <div
                            class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                        </div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">Leonardo
                                DiCaprio</a>
                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM
                            </div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief,
                            Lorem Ipsum is not simply random text. It has roots in a piece of classical
                            Latin literature from 45 BC, making it over 20</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- END: Notifications -->


    <x-account-menu />

</div>
