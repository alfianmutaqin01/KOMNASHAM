@extends('dashboard')

@section('content')
   <?php

$userName = "Komisioner A";
$notificationCount = 5; // Contoh jumlah notifikasi
$welcomeMessage = "Selamat Datang, " . $userName . "!";
$dashboardText = "Ini adalah halaman dashboard utama Anda.";
$currentActiveMenu = "dashboard"; // Variabel untuk menentukan menu aktif
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Komnas HAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Warna latar belakang abu-abu muda */
        }
        .sidebar {
            background-color: #47505a; /* Warna biru gelap untuk sidebar */
            color: #ecf0f1; /* Warna teks putih keabu-abuan */
            width: 250px;
            min-height: 100vh;
            padding: 1.5rem 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #ecf0f1;
            text-decoration: none;
            transition: background-color 0.2s ease;
            border-radius: 0.5rem; /* Sudut membulat */
            margin: 0.25rem 0.75rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #34495e; /* Warna sedikit lebih terang saat hover/aktif */
            color: #ffffff;
        }
        .sidebar a i {
            margin-right: 1rem;
            width: 20px; /* Lebar tetap untuk ikon */
            text-align: center;
        }
        .header {
            background-color: #ffffff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-area {
            padding: 2rem;
            flex-grow: 1;
        }
        .card {
            background-color: #ffffff;
            border-radius: 0.75rem; /* Sudut membulat */
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .illustration-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            background-color: #f0f8ff; /* Warna latar belakang ilustrasi */
            border-radius: 0.75rem;
            margin-top: 1rem;
            flex-direction: column;
            text-align: center;
        }
        .illustration-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        .komnas-logo {
            width: 40px; /* Ukuran logo Komnas HAM */
            height: 40px;
            margin-right: 1rem;
            border-radius: 0.5rem;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #cbd5e0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #4a5568;
            margin-left: 0.5rem;
        }
        .notification-badge {
            background-color: #ef4444; /* Merah untuk notifikasi */
            color: white;
            border-radius: 9999px; /* Bulat sempurna */
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            position: absolute;
            top: -5px;
            right: -5px;
        }
    </style>
</head>
<body class="flex">
    <!-- Sidebar -->

        <!-- Content Area -->
        <main class="content-area">
            <div class="card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo $welcomeMessage; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $dashboardText; ?></p>

                <div class="illustration-container">
                    <!-- Ilustrasi Placeholder: Menggambarkan laporan dan analisis -->
                    {{-- <img src="/public/Data extraction-cuate.svg" alt="Ilustrasi Laporan dan Analisis"> --}}
                 <div class="illustration-container">
    <!-- Ilustrasi SVG: Menggambarkan laporan dan analisis -->
    <img src="{{ asset('Finance-pana.svg') }}" alt="Ilustrasi Laporan dan Analisis" height="200" width="300" />
        <p class="text-gray-700 text-sm mt-2">
                        Dashboard ini dirancang untuk memudahkan Anda dalam memantau kegiatan, membuat laporan, dan mengakses informasi penting terkait tugas Komnas HAM.
                    </p>
                    <p class="text-gray-700 text-sm mt-1">
                        Gunakan menu navigasi di sisi kiri untuk menjelajahi fitur-fitur yang tersedia.
                    </p>
                    <div class="flex mt-4 space-x-4">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fas fa-file-alt mr-2"></i> Buat Laporan Baru
                        </button>
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fas fa-chart-bar mr-2"></i> Lihat Statistik
                        </button>
                    </div>
                </div>
            </div>

            <!-- Anda bisa menambahkan card atau widget lain di sini -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="card">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Laporan Terbaru</h4>
                    <p class="text-gray-600 text-sm">Sidak Lapas X - 15 Juni 2025</p>
                    <p class="text-gray-600 text-sm">Investigasi Kasus Y - 10 Juni 2025</p>
                </div>
                <div class="card">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Pemberitahuan</h4>
                    <p class="text-gray-600 text-sm">Rapat koordinasi besok pukul 09:00 WIB.</p>
                    <p class="text-gray-600 text-sm">Tenggat laporan minggu ini.</p>
                </div>
                <div class="card">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Akses Cepat</h4>
                    <ul class="list-disc list-inside text-gray-600 text-sm">
                        <li><a href="#" class="text-blue-500 hover:underline">Daftar Komisioner</a></li>
                        <li><a href="#" class="text-blue-500 hover:underline">Panduan Penggunaan</a></li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

@endsection
