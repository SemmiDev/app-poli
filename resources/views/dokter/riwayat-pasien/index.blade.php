<x-app-layout>
    <div class="py-12 mt-2">

        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900 mb-2 dark:text-white">Data Riwayat Pasien</h1>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. KTP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. RM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarPoliPasien as $pasien)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pasien->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pasien->alamat }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $pasien->no_ktp }}
                        </td>
                        <td class="px-6 py-4">
                                {{ $pasien->no_hp }}
                        </td>

                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span
                                class="bg-teal-100 text-teal-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">
                                {{ $pasien->no_rm }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('dokter.riwayat-pasien.show', $pasien->id) }}"
                                class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Detail
                                Riwayat Periksa</a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">
                            Belum ada data daftar periksa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
