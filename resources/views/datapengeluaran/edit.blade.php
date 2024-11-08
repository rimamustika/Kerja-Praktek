<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Data Pengeluaran') }}
            </h2>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('datapengeluaran.update', $datapengeluaran->id) }}"> <br>
                    @csrf
                    @method('PATCH')

                        <label for="tanggal">Masukan Tanggal Pengeluaran:</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $datapengeluaran->tanggal)}}" required><br><br>
                        
                        <label for="keterangan_pengeluaran">Masukan Keterangan Pengeluaran:</label>
                        <input type="text" id="keterangan_pengeluaran" name="keterangan_pengeluaran" value="{{ old('keterangan_pengeluaran', $datapengeluaran->keterangan_pengeluaran)}}" required><br><br>
                    

                        <label for="jumlah">Masukan Jumlah Pengeluaran:</label>
                        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $datapengeluaran->jumlah)}}" required><br><br>

                        <x-primary-button type="submit" name="simpan" value="true">
                            Edit Data
                        </x-button-primary>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>