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

  body {
    font-family: 'Poppins', sans-serif;
  }
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
          @if(Auth::user()->profile_photo)
          {{-- Pakai foto asli --}}
          <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="User"
            class="w-full h-full object-cover">
          @else
          {{-- Pakai dummy --}}
          <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="User"
            class="w-full h-full object-cover">
          @endif
        </div>
        <div>
          <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
          <p class="text-xs opacity-75">{{ Auth::user()->role ?? 'Mitra' }}</p>
        </div>
      </div>

      <nav class="flex-1 space-y-1 overflow-y-auto">
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

        <a href="{{ route('petshop.pesanan') }}"
          class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.pesanan') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
          <i class="fas fa-car w-8"></i>
          <span>Pesanan</span>
        </a>

        <a href="{{ route('petshop.promosi') }}"
          class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.promosi') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
          <i class="fas fa-percent w-8"></i>
          <span>Promosi</span>
        </a>

        <a href="{{ route('petshop.penghasilan') }}"
          class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.penghasilan') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
          <i class="fas fa-money-bill-wave w-8"></i>
          <span>Penghasilan Saya</span>
        </a>

        <a href="{{ route('petshop.profile') }}"
          class="flex items-center px-6 py-3 {{ request()->routeIs('petshop.profile') ? 'bg-white/20 border-l-4 border-white' : 'hover:bg-white/10 opacity-80 hover:opacity-100' }}">
          <i class="fas fa-user w-8"></i>
          <span>Profile</span>
        </a>
      </nav>

      <div class="p-6 flex justify-between items-center mt-auto">
        <a href="#" class="text-sm hover:text-gray-200 opacity-80 hover:opacity-100 transition-colors">
          Pusat Bantuan
        </a>

        <form action="{{ route('petshop.logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit"
            class="text-red-500 hover:text-red-400 text-xl transition-colors transform hover:scale-110" title="Keluar">
            <i class="fas fa-sign-out-alt"></i>
          </button>
        </form>
      </div>

    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

      <header class="bg-[#0077b6] text-white h-16 flex items-center justify-between px-8 shadow-md flex-shrink-0 z-10">
        <div class="flex items-center gap-3">

          {{-- LOGO KECIL (HEADER) --}}
          <div class="h-8 w-8 rounded-full overflow-hidden border-2 border-white flex-shrink-0 bg-yellow-400">
            @if(Auth::user()->petshop && Auth::user()->petshop->logo)
            {{-- JIKA ADA LOGO: Tampilkan --}}
            <img src="{{ asset('storage/' . Auth::user()->petshop->logo) }}" alt="Logo"
              class="w-full h-full object-cover">
            @else
            {{-- JIKA TIDAK ADA: Tampilkan Ikon Toko Kuning --}}
            <div class="w-full h-full flex items-center justify-center text-black font-bold text-[10px]">
              <i class="fas fa-store"></i>
            </div>
            @endif
          </div>

          <span class="font-bold text-lg">
            {{ Auth::user()->petshop->nama_toko ?? 'Toko Belum Diatur' }}
          </span>
        </div>

        <div class="flex items-center gap-6">
          <button class="hover:opacity-80 relative transition-opacity">
            <i class="fas fa-bell text-xl"></i>
            <span class="absolute top-0 right-0 bg-red-500 rounded-full w-2.5 h-2.5 border border-[#0077b6]"></span>
          </button>
          <button class="hover:opacity-80 transition-opacity">
            <i class="fas fa-comment-dots text-xl"></i>
          </button>
        </div>
      </header>

      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8 scroll-smooth">
        {{ $slot }}
      </main>

    </div>
  </div>
</body>

</html>