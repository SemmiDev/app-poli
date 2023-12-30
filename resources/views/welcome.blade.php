<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <div class="bg-[#234a8f] text-white flex flex-col gap-2 py-12 items-center justify-center">

        <h1 class="text-4xl font-extrabold">Sistem Temu Janji</h1>
        <h1 class="text-4xl font-extrabold">Pasien - Dokter</h1>

        <span class="text-gray-300">
            Bimbingan Karir 2023 Bidang Web
        </span>

        <a href="{{ route('login') }}"
            class="inline-flex items-center mt-12 px-5 py-3 text-center rounded-xl font-bold bg-white text-black hover:bg-gray-200">
            Sign In
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>

    <div class="ext-white flex flex-col gap-2 py-12 items-center justify-center">

        <h1 class="text-4xl font-extrabold">Testimoni Pasien</h1>
        <span class="text-gray-600">
            Para pasien yang setia
        </span>

        <div class="flex justify-evenly">
            <figure
                class="max-w-screen-sm mx-auto mt-5 text-center scale-95 hover:scale-100 transition-all duration-300 ease-in-out">
                <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path
                        d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                </svg>
                <blockquote>
                    <p class="text-2xl italic font-medium text-gray-900 dark:text-white hover:text-teal-500">"
                        Pelayanan di web ini sangat cepat dan mudah, Detail histori tercatat lengkap, termasuk catatan
                        obat. Harga pelayanan terjangkau, Dokter ramah, pokoke mantab pol!
                        "</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                    <img class="w-6 h-6 rounded-full"
                        src="https://ui-avatars.com/api/?name=Adi&color=7F9CF5&background=EBF4FF" alt="profile picture">
                    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">Adi</cite>
                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">Semarang</cite>
                    </div>
                </figcaption>
            </figure>

            <figure
                class="max-w-screen-sm mx-auto mt-5 text-center  scale-95 hover:scale-100 transition-all duration-300 ease-in-out">
                <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path
                        d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                </svg>
                <blockquote>
                    <p class="text-2xl italic font-medium text-gray-900 dark:text-white hover:text-teal-500">"
                        Aku tidak pernah merasakan mudahnya berobat sebelum aku mengenal web ini. Web yang mudah digunakan dan dokter yang terampil membuat berobat menjadi lebih menyenangkan.
                        "</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                    <img class="w-6 h-6 rounded-full"
                        src="https://ui-avatars.com/api/?name=Ida&color=7F9CF5&background=EBF4FF" alt="profile picture">
                    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">Ida</cite>
                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">Semarang</cite>
                    </div>
                </figcaption>
            </figure>

        </div>
    </div>

</body>

</html>
