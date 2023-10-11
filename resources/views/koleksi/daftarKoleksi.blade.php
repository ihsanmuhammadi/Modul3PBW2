<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Nama Koleksi</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Jenis Koleksi</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Jumlah Koleksi</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $collection)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->namaKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->jenisKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->jumlahKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><a href="{{ route('koleksiView', $collection) }}"><button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-blue-600">Rincian</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
