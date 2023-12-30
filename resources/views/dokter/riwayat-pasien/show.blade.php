<x-app-layout>
    <div class="py-12 mt-2">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Periksa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keluhan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Catatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Obat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Biaya
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat as $data)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->periksa->tgl_periksa }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->pasien->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->keluhan }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $data->periksa->catatan }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($data->periksa->detail_periksa->isEmpty())
                                -
                            @else
                                <ul>
                                    @forelse ($data->periksa->detail_periksa as $obat)
                                    <li>
                                        {{ $obat->obat->nama_obat . ' | ' . $obat->obat->kemasan . ' | ' . number_format($obat->obat->harga, 0, ',', '.') }}
                                    </li>
                                    @empty
                                        -
                                    @endforelse
                                </ul>
                            @endif
                        </td>

                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span
                                class="bg-teal-100 text-teal-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">
                                {{ number_format($data->periksa->biaya_periksa, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">
                            Belum ada data riwayat periksa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
