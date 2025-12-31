<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mitra PawPaw' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Tambahan agar font mirip desain */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">

        <aside class="w-64 bg-[#0077b6] text-white flex flex-col flex-shrink-0 transition-all duration-300">
            <div class="p-6 flex items-center gap-3">
                <div class="bg-white p-2 rounded-full w-10 h-10 flex items-center justify-center text-[#0077b6]">
                    <i class="fas fa-paw text-xl"></i>
                </div>
                <span class="font-bold text-lg tracking-wide">Mitra PawPaw</span>
            </div>

            <div class="px-6 mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden border-2 border-white">
                    <img src="https://ui-avatars.com/api/?name=Hana+Sobarna&background=random" alt="User">
                </div>
                <div>
                    <p class="text-sm font-semibold">Hana Sobarna</p>
                    <p class="text-xs opacity-75">Owner</p>
                </div>
            </div>

            <nav class="flex-1 space-y-1">
                <a href="{{ route('petshop.dashboard') }}"
                   class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.dashboard') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                    <i class="fas fa-home w-8"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('petshop.layanan') }}"
                   class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.layanan') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
                    <i class="fas fa-concierge-bell w-8"></i>
                    <span>Layanan</span>
                </a>

                <a href="#" class="flex items-center px-6 py-3 hover:bg-white/10 opacity-80 hover:opacity-100">
                    <i class="fas fa-car w-8"></i>
                    <span>Pesanan</span>
                </a>

                <a href="#" class="flex items-center px-6 py-3 hover:bg-white/10 opacity-80 hover:opacity-100">
                    <i class="fas fa-percent w-8"></i>
                    <span>Promosi</span>
                </a>

                <a href="#" class="flex items-center px-6 py-3 hover:bg-white/10 opacity-80 hover:opacity-100">
                    <i class="fas fa-money-bill-wave w-8"></i>
                    <span>Penghasilan</span>
                </a>

                <a href="#" class="flex items-center px-6 py-3 hover:bg-white/10 opacity-80 hover:opacity-100">
                    <i class="fas fa-user w-8"></i>
                    <span>Profile</span>
                </a>
            </nav>

            <div class="p-6">
                <a href="#" class="flex items-center gap-2 text-sm hover:text-gray-200 opacity-80 hover:opacity-100">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Pusat Bantuan</span>
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-screen overflow-hidden">

            <header class="bg-[#0077b6] text-white h-16 flex items-center justify-between px-8 shadow-md flex-shrink-0 z-10">
                <div class="flex items-center gap-3">
                    <div class="bg-yellow-400 text-black font-bold text-xs h-8 w-8 rounded-full flex items-center justify-center border-2 border-white">
                        EPS
                    </div>
                    <span class="font-bold text-lg">Ello PetShop Sumedang</span>
                </div>
                <div class="flex items-center gap-6">
                    <button class="hover:opacity-80 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 rounded-full w-2 h-2"></span>
                    </button>
                    <button class="hover:opacity-80"><i class="fas fa-comment-dots text-xl"></i></button>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8">
                {{ $slot }}
            </main>

        </div>
    </div>
</body>
</html>