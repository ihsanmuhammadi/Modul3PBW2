<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Full name -->
        <div class="mt-4">
            <x-input-label for="fullname" :value="__('Nama Lengkap')" />
            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Username -->
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="adress" :value="__('Alamat')" />
            <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required autofocus />
            <x-input-error :messages="$errors->get('adress')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

         <!-- Phone Number -->
         <div class="mt-4">
            <x-input-label for="phoneNumber" :value="__('No Telepon')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" required autofocus />
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
        </div>

        <!-- Agama -->
        <div class="mt-4">
            <x-input-label for="agama" :value="__('Agama')" />
            <x-text-input id="agama" class="block mt-1 w-full" type="text" name="agama" :value="old('agama')" required autofocus />
            <x-input-error :messages="$errors->get('agama')" class="mt-2" />
        </div>

        <!--  NIM : 6706220123
        NAMA : IHSAN MUHAMMAD IQBAL
        KELAS : 46-03 -->
        <!-- Gender -->
        <div class="mt-4">
            <x-input-label :value="__('Jenis Kelamin')" for="gender" />
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="1" class="form-radio" {{ old('gender') === '1' ? 'checked' : '' }} required>
                    <span class="mr-1 ml-1">Laki-laki</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="gender" value="2" class="form-radio" {{ old('gender') === '2' ? 'checked' : '' }} required>
                    <span class="ml-1">Perempuan</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
