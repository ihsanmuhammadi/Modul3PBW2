<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
<x-app-layout>
    <x-guest-layout>
        <form method="POST" action="{{ route('koleksiStore') }}">
            @csrf

            <!-- Nama Koleksi -->
            <div>
                <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
                <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')" required autofocus />
                <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
            </div>

            <!-- Jenis Koleksi -->
            <div class="mt-4">
                <x-input-label :value="__('Jenis Koleksi')" for="jenisKoleksi" />
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenisKoleksi" value="1" class="form-radio mr-1" {{ old('jenisKoleksi') === '1' ? 'checked' : '' }} required>
                        <span class="mr-1">Buku</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenisKoleksi" value="2" class="form-radio ml-1" {{ old('jenisKoleksi') === '2' ? 'checked' : '' }} required>
                        <span class="mr-2 ml-1">Majalah</span>
                    </label>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenisKoleksi" value="2" class="form-radio ml-1" {{ old('jenisKoleksi') === '2' ? 'checked' : '' }} required>
                        <span class="ml-1">Cakram Digital</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
            </div>

            <!-- Jumlah Koleksi -->
            <div class="mt-4">
                <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
                <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="number" name="jumlahKoleksi" :value="old('jumlahKoleksi')" required autofocus />
                <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
            </div>

            <!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
            <!-- Pengarang -->
            <div class="mt-4">
                <x-input-label for="namaPengarang" :value="__('Nama Pengarang')" />
                <x-text-input id="namaPengarang" class="block mt-1 w-full" type="text" name="namaPengarang" :value="old('namaPengarang')" required autofocus />
                <x-input-error :messages="$errors->get('namaPengarang')" class="mt-2" />
            </div>

            <!-- Tahun Terbit -->
            <div class="mt-4">
                <x-input-label for="tahunTerbit" :value="__('Tahun Terbit')" />
                <x-text-input id="tahunTerbit" class="block mt-1 w-full" type="number" name="tahunTerbit" :value="old('tahunTerbit')" required autofocus />
                <x-input-error :messages="$errors->get('tahunTerbit')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Tambah') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>