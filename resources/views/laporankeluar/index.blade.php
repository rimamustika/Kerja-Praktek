<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Uang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-button tag="a" href="{{route('laporankeluar.print')}}" target='blank'>
                        CETAK PDF
                    </x-primary-button>

                    <x-export-button tag="a" href="{{route('laporankeluar.export')}}" target='_blank'>
                        Export Excel
                    </x-export-button>
                    <br></br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan Pengeluaran</th>
                                <th>Jumlah Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $num = 1; @endphp
                            @foreach ($uang_keluars as $uang_keluar)
                                <tr class="table-active">
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $uang_keluar->tanggal }}</td>
                                    <td>{{ $uang_keluar->keterangan_pengeluaran }}</td>
                                    <td>{{ $uang_keluar->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
</x-app-layout>