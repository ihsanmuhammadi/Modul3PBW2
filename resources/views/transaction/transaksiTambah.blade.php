<!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
        @extends('layouts.guest')
        @section('content')
            <form method="POST" action="{{ route('transaksiStore') }}">
                @csrf

                <!-- Nama Peminjam -->
                <div>
                    <x-input-label for="idPeminjam" :value="__('Nama Peminjam')" />
                    <select id="idPeminjam" name="idPeminjam" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">Pilih nama peminjam</option>
                        @foreach ($users as $user)
                        @if ($user->id == old('userPeminjam'))
                        <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                        @else
                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                </div>

                <!-- Koleksi 1 -->
                <div class="mt-4">
                    <x-input-label for="koleksi1" :value="__('Koleksi 1')" />
                    <select id="koleksi1" name="koleksi1" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">Pilih koleksi pertama</option>
                        @foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi1'))
                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('koleksi1')" class="mt-2" />
                </div>

                <!-- Koleksi 2 -->
                <div class="mt-4">
                    <x-input-label for="koleksi2" :value="__('Koleksi 2')" />
                    <select id="koleksi2" name="koleksi2" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">Pilih koleksi kedua</option>
                        <@foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi2'))
                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('koleksi2')" class="mt-2" />
                </div>

                <!-- Koleksi 3 -->
                <div class="mt-4">
                    <x-input-label for="koleksi3" :value="__('Koleksi 3')" />
                    <select id="koleksi3" name="koleksi3" class="block mt-1 w-full border rounded py-2 px-3" required autofocus>
                        <option value="-1">Pilih koleksi ketiga</option>
                        @foreach ($collections as $collection)
                        @if ($collection->id == old('koleksi3'))
                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                        @else
                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('koleksi3')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4" type="reset">
                        Reset
                    </x-primary-button>
                    <x-primary-button class="ml-4">
                        {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>

            {{-- button back --}}
            <a href="{{ route('user') }}" class="text-blue-500 hover:text-blue-700 underline" style="cursor: pointer; text-decoration: none;">
                Back &larr;
            </a>
        @endsection
