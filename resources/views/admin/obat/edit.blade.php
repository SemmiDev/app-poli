<x-app-layout>
    <div class="py-12 mt-2">

        <form method="POST" action="{{ route('admin.obat.update', $obat->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="nama_obat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Obat</label>
                <input type="text" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}" autofocus
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan nama obat" required>
                <x-input-error :messages="$errors->get('nama_obat')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="kemasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kemasan</label>
                <input type="text" id="kemasan" name="kemasan" value="{{ $obat->kemasan }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan Kemasan" required>
                <x-input-error :messages="$errors->get('kemasan')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ $obat->harga }}"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan Harga" required>
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center">
                <x-primary-button class="ms-3">
                    Update Obat
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
