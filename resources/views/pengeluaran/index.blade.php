<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tambah Data Pengeluaran") }}
                </div>
            </div>
        </div>
        <form action="/action_page.php"><br>
            <label for="fname">Masukan Tanggal Pengeluaran:</label>
            <input type="text" id="fname" value="John"><br><br>
            <label for="fname">Masukan Keterangan Pengeluaran:</label>
            <input type="text" id="fname" name="fname"><br><br>
             <label for="lname">Masukan Jumlah Pengeluaran:</label>
            <input type="text" id="lname" name="lname">
        </form>
            <input type="submit" value="Submit">
      
    </div>
</x-app-layout>