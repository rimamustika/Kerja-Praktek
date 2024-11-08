<nav x-data="{ open: false }" class="d-flex flex-column bg-white h-full border-t min-h-screen">
    <div class="pt-8 pl-3">

        <!-- Navigation Links -->
        <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-dashboard pr-2"></i>{{ __('Dashboard') }}
            </x-nav-link>
        </div>

        <div class="hidden space-x-8 sm:items-center sm:-my-px sm:ms-10 sm:flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <x-nav-link :active="request()->routeIs('datapemasukan.index') || request()->routeIs('datapengeluaran.index')">
                        <i class="fa-solid fa-circle-info pr-2 text-sm"></i>{{ __('Data Harian') }}

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-nav-link>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('datapemasukan.index')">
                        <i class="fa-solid fa-user-graduate pr-2 text-sm"></i>{{ __('Data Pemasukan') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('datapengeluaran.index')">
                        <i class="fa-solid fa-industry pr-2 text-sm"></i>{{ __('Data Pengeluaran') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>

        <div class="hidden space-x-8 sm:items-center sm:-my-px sm:ms-10 sm:flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <!-- <x-nav-link :active="request()->routeIs('pemasukan.index') || request()->routeIs('pengeluaran.index')">
                        <i class="fa-solid fa-circle-info pr-2 text-sm"></i>{{ __('Input Data') }}

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-nav-link> -->
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('pemasukan.index')">
                        <i class="fa-solid fa-user-graduate pr-2 text-sm"></i>{{ __('Pemasukan') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('pengeluaran.index')">
                        <i class="fa-solid fa-industry pr-2 text-sm"></i>{{ __('Pengeluaran') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- <div class="hidden pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('inputdata.index')" :active="request()->routeIs('inputdata.index')">
                <i class="fa-solid fa-dashboard pr-2"></i>{{ __('Input Data') }}
            </x-nav-link>
        </div> -->

        <div class="hidden space-x-8 sm:items-center sm:-my-px sm:ms-10 sm:flex">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <x-nav-link :active="request()->routeIs('laporanmasuk.index') || request()->routeIs('laporankeluar.index')">
                        <i class="fa-solid fa-circle-info pr-2 text-sm"></i>{{ __('Laporan') }}

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </x-nav-link>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('laporanmasuk.index')" class="flex justify-between items-center pr-16">
                        <i class="fa-solid fa-user-graduate ml-6 text-sm"></i>{{ __('Laporan Uang Masuk') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('laporankeluar.index')" class="flex justify-between items-center pr-16">
                        <i class="fa-solid fa-industry ml-6 text-sm"></i>{{ __('Laporan Uang Keluar') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>


    </div>
</nav>