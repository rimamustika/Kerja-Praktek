<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Pemasukan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Data Pemasukan') }}
            </h2>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('datapemasukan.update', $datapemasukan->id) }}"> <br>
                    @csrf
                    @method('PATCH')

                        <label for="tanggal">Masukan Tanggal Pemasukan:</label>
                        <input type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $datapemasukan->tanggal)}}" required><br><br>
                        
                        <label for="keterangan_pemasukan">Masukan Keterangan Pemasukan:</label>
                        <input type="text" id="keterangan_pemasukan" name="keterangan_pemasukan" value="{{ old('keterangan_pemasukan', $datapemasukan->keterangan_pemasukan)}}" required><br><br>
                    

                        <label for="jumlah">Masukan Jumlah Pemasukan:</label>
                        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $datapemasukan->jumlah)}}" required><br><br>

                        <x-primary-button type="submit" name="simpan" value="true">
                            Edit Data
                        </x-button-primary>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>