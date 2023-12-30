<x-app-layout>
    <div class="py-12 mt-2">

        <form method="POST" action="{{ route('admin.poli.store') }}">
            @csrf
            <div class="mb-5">
                <label for="nama_poli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama_poli" name="nama_poli"
                autofocus
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan nama poli" required>
                <x-input-error :messages="$errors->get('nama_poli')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label for="keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">keterangan</label>
                <input type="text" id="keterangan" name="keterangan"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Masukkan keterangan" required>
                <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
            </div>

            <div class="flex justify-between items-center">
                <x-primary-button
                type="submit"
                class="ms-3">
                    Tambah Poli
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
