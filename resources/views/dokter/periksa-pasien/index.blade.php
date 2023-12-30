<x-app-layout>
    <div class="py-12 mt-2">

        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900 mb-2 dark:text-white">Data Periksa Pasien</h1>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Rekam medis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keluhan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jadwal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Antrian
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Periksa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarPoliPasien as $poliPasien)
                    @foreach ($poliPasien->daftar_polis as $poli)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <span
                                    class="bg-teal-100 text-teal-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">
                                    {{ $poli->pasien->no_rm }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                {{ $poli->pasien->nama }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $poli->keluhan }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $poliPasien->hari . ' ' . date('H:i:s', strtotime($poliPasien->jam_mulai)) . '-' . date('H:i:s', strtotime($poliPasien->jam_selesai)) }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $poli->no_antrian }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @php
                                    $periksa = App\Models\Periksa::where('id_daftar_poli', $poli->id)->first();
                                @endphp

                                @if ($periksa)
                                <div class="flex justify-center">

                                    <svg class="w-6 h-6 text-green-500 dark:text-green-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                            d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                        <path fill="#fff"
                                            d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                    </svg>
                                </div>
                                @else
                                    <a href="{{ route('dokter.periksa-pasien.edit', $poli->id) }}"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                        Periksa
                                    </a>
                                @endif

                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('dokter.periksa-pasien.detail', $poli->id) }}"
                                    class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Detail</a>
                            </td>
                        </tr>
                    @endforeach
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
