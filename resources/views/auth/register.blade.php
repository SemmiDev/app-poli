<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="border-b-2 mb-5">
            <h1 class="text-3xl text-center pb-5"><span class="font-bold">Poli</span>klinik</h1>
        </div>

        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="name" name="name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan nama lengkap" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password"
            placeholder="*******"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="no_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No KTP</label>
            <input type="text" id="no_ktp" name="no_ktp"

                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan No KTP" required>
            <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
            <input type="text" id="no_hp" name="no_hp"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan No HP" required>
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="mb-5">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
            <input type="text" id="alamat" name="alamat"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukkan alamat" required>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="terms" type="checkbox" value=""
                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                    required>
            </div>
            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the
                <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                    conditions</a></label>
        </div>

        <div class="flex justify-between items-center">
            <x-primary-button class="ms-3">
                {{ __('Register a new account') }}
            </x-primary-button>

            <a href="{{ route('login') }}" class="text-blue-600 hover:underline dark:text-blue-500">Already
                registered?</a>

        </div>
    </form>
</x-guest-layout>
