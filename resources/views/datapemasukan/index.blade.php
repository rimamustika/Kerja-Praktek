<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pemasukan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- <div class="max-w-xl mr-6">
                        <x-input-label for="tgl_awal" value="Pilih Tanggal" />
                        <x-text-input id="tgl_awal" type="date" name="tgl_awal" class="mt-1 block" required />
                        <x-input-error class="mt-2" :messages="$errors->get('tgl_awal')" />
                    </div> -->
                    <div class="max-w-xl mr-6 mb-4">
                        <form method="GET" action="{{ route('datapemasukan.index') }}">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <x-input-label for="tgl_awal" value="Tanggal Awal" />
                                    <x-text-input id="tgl_awal" type="date" name="tgl_awal" class="mt-1 block" required
                                        value="{{ request('tgl_awal') }}" />
                                </div>
                                <div>
                                    <x-input-label for="tgl_akhir" value="Tanggal Akhir" />
                                    <x-text-input id="tgl_akhir" type="date" name="tgl_akhir" class="mt-1 block"
                                        required value="{{ request('tgl_akhir') }}" />
                                </div>
                                <div class="mt-6">
                                    <x-primary-button type="submit">
                                        {{ __('Filter') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Keterangan Pemasukan</th>
                                <th>Jumlah Pemasukan</th>
                                @role('stafKeuangan')
                                <th>Aksi</th>
                                @endrole('stafKeuangan')
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
                                    @role('stafKeuangan')
                                    <td>
                                        <x-primary-button tag="a" href="{{route('datapemasukan.edit', $uang_masuk->id)}}">
                                            EDIT
                                        </x-primary-button>

                                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal',
                                                    'confirm-datapemasukan-deletion')" x-on:click="$dispatch('set-action',
                                                    '{{ route('datapemasukan.destroy', $uang_masuk->id) }}')">
                                            {{ __('Delete')}}
                                        </x-danger-button>
                                    </td>
                                    @endrole('stafKeuangan')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @role('stafKeuangan')
                    <x-primary-button tag="a" href="{{route('datapemasukan.create')}}">
                        TAMBAH DATA
                    </x-primary-button>
                    @endrole('stafKeuangan')

                    @foreach ($uang_masuks as $data)
                        <x-modal name="confirm-datapemasukan-deletion" focusable maxWidth="xl">
                            <form method="post" action="{{ route('datapemasukan.destroy', $data->id) }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Apakah anda yakin akan menghapus data?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Setelah proses dilakukan. Data akan dihilangkan secara permanen.') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ml-3">
                                        {{ __('Delete Data') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    @endforeach

                </div>
            </div>
            <br>

            <!-- <a href="{{ route('datapemasukan.create') }}">Tambah Data</a> -->
            <br>
        </div>
    </div>

</x-app-layout>