<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Uang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-primary-button tag="a" href="{{route('laporanmasuk.print')}}" target='blank'>
                        CETAK PDF
                    </x-primary-button>

                    <x-export-button tag="a" href="{{route('laporanmasuk.export')}}" target='_blank'>
                        Export Excel
                    </x-export-button>
                    <br></br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan Pemasukan</th>
                                <th>Jumlah Pemasukan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $num = 1; @endphp
                            @foreach ($uang_masuks as $uang_masuk)
                                <tr class="table-active">
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $uang_masuk->tanggal}}</td>
                                    <td>{{ $uang_masuk->keterangan_pemasukan}}</td>
                                    <td>{{ $uang_masuk->jumlah}}</td>
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