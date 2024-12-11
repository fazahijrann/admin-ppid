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
                <!-- BEGIN: Center Content-->
                <div class="col-span-12 2xl:col-span-9">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    General Report
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
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPemohon }}</div>
                                            <div class="text-base text-slate-500 mt-1">Total Pemohon </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="shopping-cart"
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
                                                <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalKeberatan }}</div>
                                            <div class="text-base text-slate-500 mt-1">Total Keberatan</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                                <div class="ml-auto">
                                                </div>
                                            </div>
                                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPengunjung }}
                                            </div>
                                            <div class="text-base text-slate-500 mt-1">Total Pengunjung Website</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->

                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Weekly Top Seller
                                </h2>
                                <a href="" class="ml-auto text-primary truncate">Show More</a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <canvas class="mt-3" id="report-pie-chart" height="300"></canvas>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                        <span class="truncate">17 - 30 Years old</span> <span
                                            class="font-medium xl:ml-auto">62%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                        <span class="truncate">31 - 50 Years old</span> <span
                                            class="font-medium xl:ml-auto">33%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                        <span class="truncate">>= 50 Years old</span> <span
                                            class="font-medium xl:ml-auto">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Weekly Top Seller -->




                    </div>
                </div>
                <!-- END: Center Content-->

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
                                                <img alt="Midone - HTML Admin Template" src="dist/images/profile-7.jpg">
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
                                    <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div
                                            class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
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
                                                    href="">Sony A7 III</a> price and description</div>
                                        </div>
                                    </div>
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div
                                            class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
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
                                                    href="">Nikon Z6</a> description</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Recent Activities -->

                            <!-- BEGIN: Schedules -->
                            <div
                                class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Schedules
                                    </h2>
                                    <a href="" class="ml-auto text-primary truncate flex items-center">
                                        <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Add New Schedules </a>
                                </div>
                                <div class="mt-5">
                                    <div class="intro-x box">
                                        <div class="p-5">
                                            <div class="flex">
                                                <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                                                <div class="font-medium text-base mx-auto">April</div>
                                                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                                            </div>
                                            <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                                <div class="font-medium">Su</div>
                                                <div class="font-medium">Mo</div>
                                                <div class="font-medium">Tu</div>
                                                <div class="font-medium">We</div>
                                                <div class="font-medium">Th</div>
                                                <div class="font-medium">Fr</div>
                                                <div class="font-medium">Sa</div>
                                                <div class="py-0.5 rounded relative text-slate-500">29</div>
                                                <div class="py-0.5 rounded relative text-slate-500">30</div>
                                                <div class="py-0.5 rounded relative text-slate-500">31</div>
                                                <div class="py-0.5 rounded relative">1</div>
                                                <div class="py-0.5 rounded relative">2</div>
                                                <div class="py-0.5 rounded relative">3</div>
                                                <div class="py-0.5 rounded relative">4</div>
                                                <div class="py-0.5 rounded relative">5</div>
                                                <div class="py-0.5 bg-success/20 rounded relative">
                                                    6</div>
                                                <div class="py-0.5 rounded relative">7</div>
                                                <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                                <div class="py-0.5 rounded relative">9</div>
                                                <div class="py-0.5 rounded relative">10</div>
                                                <div class="py-0.5 rounded relative">11</div>
                                                <div class="py-0.5 rounded relative">12</div>
                                                <div class="py-0.5 rounded relative">13</div>
                                                <div class="py-0.5 rounded relative">14</div>
                                                <div class="py-0.5 rounded relative">15</div>
                                                <div class="py-0.5 rounded relative">16</div>
                                                <div class="py-0.5 rounded relative">17</div>
                                                <div class="py-0.5 rounded relative">18</div>
                                                <div class="py-0.5 rounded relative">19</div>
                                                <div class="py-0.5 rounded relative">20</div>
                                                <div class="py-0.5 rounded relative">21</div>
                                                <div class="py-0.5 rounded relative">22</div>
                                                <div class="py-0.5 bg-pending/20 rounded relative">
                                                    23</div>
                                                <div class="py-0.5 rounded relative">24</div>
                                                <div class="py-0.5 rounded relative">25</div>
                                                <div class="py-0.5 rounded relative">26</div>
                                                <div class="py-0.5 bg-primary/10 rounded relative">
                                                    27</div>
                                                <div class="py-0.5 rounded relative">28</div>
                                                <div class="py-0.5 rounded relative">29</div>
                                                <div class="py-0.5 rounded relative">30</div>
                                                <div class="py-0.5 rounded relative text-slate-500">1</div>
                                                <div class="py-0.5 rounded relative text-slate-500">2</div>
                                                <div class="py-0.5 rounded relative text-slate-500">3</div>
                                                <div class="py-0.5 rounded relative text-slate-500">4</div>
                                                <div class="py-0.5 rounded relative text-slate-500">5</div>
                                                <div class="py-0.5 rounded relative text-slate-500">6</div>
                                                <div class="py-0.5 rounded relative text-slate-500">7</div>
                                                <div class="py-0.5 rounded relative text-slate-500">8</div>
                                                <div class="py-0.5 rounded relative text-slate-500">9</div>
                                            </div>
                                        </div>
                                        <div class="border-t border-slate-200/60 p-5">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                <span class="truncate">UI/UX Workshop</span> <span
                                                    class="font-medium xl:ml-auto">23th</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                <span class="truncate">VueJs Frontend Development</span> <span
                                                    class="font-medium xl:ml-auto">10th</span>
                                            </div>
                                            <div class="flex items-center mt-4">
                                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                <span class="truncate">Laravel Rest API</span> <span
                                                    class="font-medium xl:ml-auto">31th</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Schedules -->
                        </div>
                    </div>
                </div>
                <!-- END: Right Content-->

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
