<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rincian Informasi Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Nomor Telepon</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Username</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Tanggal Lahir</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Agama</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->fullname }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->phoneNumber }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->username }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->adress }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->birthdate }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->agama }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->gender }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
