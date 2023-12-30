<x-app-layout>
    <div class="py-12 mt-2">

        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Jadwal Periksa</h1>
            <a href="{{ route('dokter.jadwal-periksa.create') }}"
                class="focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Tambah
                Jadwal</a>
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
                        Jam Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jam Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarJadwalPeriksa as $jadwal)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span
                            class="bg-teal-100 text-teal-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-teal-900 dark:text-teal-300">

                            {{ $jadwal->hari }}
                        </span>
                        </th>
                        <td class="px-6 py-4">
                            {{
                                date('H:i:s', strtotime($jadwal->jam_mulai))
                            }}
                        </th>
                        <td class="px-6 py-4">
                            {{
                                date('H:i:s', strtotime($jadwal->jam_selesai))
                            }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('dokter.jadwal-periksa.edit', ['jadwal' => $jadwal->id]) }}"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                            <form action="{{ route('dokter.jadwal-periksa.destroy', ['jadwal' => $jadwal->id]) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">
                            Belum ada data jadwal periksa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
