<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Komisioner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Selamat datang di Dashboard Komisioner Komnas HAM!
                    </h1>
                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Di sini Anda dapat membuat laporan kegiatan, melihat riwayat laporan, dan mengajukan surat tugas.
                    </p>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Buat Laporan Baru
                    </a>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        Ajukan Surat Tugas
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>