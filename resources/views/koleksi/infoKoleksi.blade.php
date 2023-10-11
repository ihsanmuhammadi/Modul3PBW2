 <!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rincian Informasi Koleksi') }}
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
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Nama Pengarang</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Tahun Terbit</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Waktu Input</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->namaKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->jenisKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->jumlahKoleksi }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->namaPengarang }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->tahunTerbit }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $collection->createdAt }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
