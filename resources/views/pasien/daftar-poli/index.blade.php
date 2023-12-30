<x-app-layout>
    <div class="py-12 mt-2">

        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Daftar Poli</h1>
            <a href="{{ route('pasien.daftar-poli.create') }}"
                class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Tambah
                Poli</a>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hari
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Mulai - Jam Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Antrian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keluhan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarPoli as $poli)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span
                                class="bg-teal-100 text-teal-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">

                                {{ $poli->jadwal_periksa->hari }}
                            </span>
                        </th>
                        <td class="px-6 py-4">
                            {{ date('H:i:s', strtotime($poli->jadwal_periksa->jam_mulai)) . '-' . date('H:i:s', strtotime($poli->jadwal_periksa->jam_selesai)) }}
                            </th>
                        <td class="px-6 py-4">
                            {{ $poli->no_antrian }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $poli->keluhan }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            @php
                                $isHasBeenPeriksa = \App\Models\Periksa::where('id_daftar_poli', $poli->id)->first();
                            @endphp

                            @if ($isHasBeenPeriksa)
                                <a href="{{ route('dokter.daftar-poli.show', ['poli' => $poli->id]) }}"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                    Detail
                                </a>
                            @else
                                <form action="{{ route('dokter.daftar-poli.destroy', ['poli' => $poli->id]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Batalkan
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">
                            Belum ada data daftar poli.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
