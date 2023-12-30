<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Poliklinik BK</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="gap-2 items-center flex ms-2 md:me-24">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrP6VWG1FNxEAIA-1vMxyLVGWdtnSEUKRnoCvPkyiucxIIWUh7mfJAximQDeMV6NpQzHU&usqp=CAU"
                                    class="block h-10 w-auto" alt="">
                                Poliklinik BK
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div class="flex gap-5 items-center">
                                <div class="flex flex-col items-end">
                                    <span class="hidden md:inline-block text-sm text-gray-500 dark:text-gray-400"
                                        id="liveTime"></span>
                                    <span id="hm"
                                        class="hidden md:inline-block text-sm text-gray-500 dark:text-gray-400"></span>
                                </div>
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                    {{ Auth::user()->role }}
                                </span>

                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                        alt="user photo">
                                </button>
                            </div>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-user">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ Auth::user()->username }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Pengaturan Akun</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                                role="menuitem"
                                                onclick="event.preventDefault(); this.closest('form').submit();">Sign
                                                out</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex">
            <aside id="logo-sidebar"
                class="fixed top-0 left-0 rounded-r-lg overflow-hidden bg-[#214b8e] z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidebar">
                <div class="h-full bg-[#214b8e] rounded-r-lg overflow-hidden px-3 pb-4 overflow-y-auto text-white">
                    <ul class="space-y-2 font-medium">
                        {{-- <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg dark:text-white group">
                            <svg class="w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li> --}}
                        @if (Auth::user()->role == 'Admin')
                            <li
                                class="{{ request()->routeIs('admin.dokter.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('admin.dokter.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">

                                        <path
                                            d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Dokter</span>
                                </a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.pasien.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('admin.pasien.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                        <path
                                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Pasien</span>
                                </a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.poli.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href={{ route('admin.poli.index') }}
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 18">
                                        <path
                                            d="M17 16h-1V2a1 1 0 1 0 0-2H2a1 1 0 0 0 0 2v14H1a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM5 4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4Zm0 5V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Zm6 7H7v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm2-7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Zm0-4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Poli</span>
                                </a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.obat.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('admin.obat.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                                        <path
                                            d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Obat</span>
                                </a>
                            </li>
                        @elseif (Auth::user()->role == 'Dokter')
                            <li
                                class="{{ request()->routeIs('dokter.jadwal-periksa.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('dokter.jadwal-periksa.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 8v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0Zm12 7h-1v1a1 1 0 0 1-2 0v-1H8a1 1 0 0 1 0-2h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 0 1 0 2Z" />
                                    </svg>


                                    <span class="flex-1 ms-3 whitespace-nowrap">Jadwal Periksa</span>
                                </a>
                            </li>


                            <li
                                class="{{ request()->routeIs('dokter.periksa.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('dokter.periksa.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="m17.351 3.063-8-3a1.009 1.009 0 0 0-.7 0l-8 3A1 1 0 0 0 0 4a19.394 19.394 0 0 0 8.47 15.848 1 1 0 0 0 1.06 0A19.394 19.394 0 0 0 18 4a1 1 0 0 0-.649-.937Zm-3.644 4.644-5 5A1 1 0 0 1 8 13c-.033 0-.065 0-.1-.005a1 1 0 0 1-.733-.44l-2-3a1 1 0 0 1 1.664-1.11l1.323 1.986 4.138-4.138a1 1 0 0 1 1.414 1.414h.001Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Memeriksa Pasien</span>
                                </a>
                            </li>

                            <li
                                class="{{ request()->routeIs('dokter.riwayat-pasien.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}"
                            >
                                <a href="{{ route('dokter.riwayat-pasien.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Riwayat Pasien</span>
                                </a>
                            </li>
                        @elseif (Auth::user()->role == 'Pasien')
                            <li
                                class="{{ request()->routeIs('pasien.daftar-poli.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                                <a href="{{ route('pasien.daftar-poli.index') }}"
                                    class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z" />
                                    </svg>

                                    <span class="flex-1 ms-3 whitespace-nowrap">Daftar Poli</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap">Profil</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </aside>

            <div class="flex-1 ml-64">
                <div class="py-12 mt-2">
                    <div class="max-w-7xl sm:px-6 lg:px-8">
                        <!-- Content Slot -->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const liveTime = document.getElementById('liveTime');
    const hm = document.getElementById('hm');

    const date = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };

    liveTime.innerHTML = date.toLocaleDateString('id-ID', options);
    setInterval(() => {
        const date = new Date();
        liveTime.innerHTML = date.toLocaleDateString('id-ID', options);
        const hours = date.getHours();
        hm.innerHTML =
            `${hours < 10 ? `0${hours}` : hours}:${date.getMinutes() < 10 ? `0${date.getMinutes()}` : date.getMinutes()}`;
    }, 1000);
</script>

</html>
