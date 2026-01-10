<x-layouts.petshop title="Dashboard - PawPaw">

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- KOLOM UTAMA (KIRI) --}}
    <div class="lg:col-span-2 space-y-6">

      {{-- 1. ACTION ITEMS (YANG PERLU DILAKUKAN) --}}
      <div class="bg-white rounded-xl shadow-sm border border-blue-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
          <h3 class="text-lg font-bold text-[#0077b6]">Yang Perlu Dilakukan</h3>
          <span class="text-xs text-gray-400">Update terakhir: Barusan</span>
        </div>
        <div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
          <div
            class="cursor-pointer hover:bg-blue-50 p-3 rounded-xl transition group border border-transparent hover:border-blue-100">
            <div class="text-3xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">0</div>
            <div class="text-xs text-gray-500 font-medium mt-1 group-hover:text-[#0077b6]">Perlu Dikirim</div>
          </div>
          <div
            class="cursor-pointer hover:bg-blue-50 p-3 rounded-xl transition group border border-transparent hover:border-blue-100">
            <div class="text-3xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">0</div>
            <div class="text-xs text-gray-500 font-medium mt-1 group-hover:text-[#0077b6]">Sudah Dikirim</div>
          </div>
          <div
            class="cursor-pointer hover:bg-blue-50 p-3 rounded-xl transition group border border-transparent hover:border-blue-100">
            <div class="text-3xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">0</div>
            <div class="text-xs text-gray-500 font-medium mt-1 group-hover:text-[#0077b6]">Pembatalan</div>
          </div>
          <div
            class="cursor-pointer hover:bg-blue-50 p-3 rounded-xl transition group border border-transparent hover:border-blue-100">
            <div class="text-3xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">0</div>
            <div class="text-xs text-gray-500 font-medium mt-1 group-hover:text-[#0077b6]">Produk Habis</div>
          </div>
        </div>
      </div>

      {{-- 2. PERFORMA TOKO (STATISTIK) --}}
      <div class="bg-white rounded-xl shadow-sm border border-blue-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
          <h3 class="text-lg font-bold text-[#0077b6]">Statistik Toko</h3>
        </div>
        <div class="p-6 grid grid-cols-2 md:grid-cols-5 gap-y-6 gap-x-4">
          {{-- Item 1 --}}
          <div class="relative">
            <div class="text-xs text-gray-400 mb-1 uppercase font-bold tracking-wider">Pendapatan</div>
            <div class="text-lg font-bold text-gray-800">Rp 0</div>
            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
              <i class="fas fa-minus text-gray-300"></i> Stabil
            </div>
          </div>
          {{-- Item 2 --}}
          <div>
            <div class="text-xs text-gray-400 mb-1 uppercase font-bold tracking-wider">Pengunjung</div>
            <div class="text-lg font-bold text-gray-800">0</div>
            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
              <i class="fas fa-minus text-gray-300"></i> vs kemarin
            </div>
          </div>
          {{-- Item 3 --}}
          <div>
            <div class="text-xs text-gray-400 mb-1 uppercase font-bold tracking-wider">Produk Dilihat</div>
            <div class="text-lg font-bold text-gray-800">0</div>
            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
              <i class="fas fa-minus text-gray-300"></i> vs kemarin
            </div>
          </div>
          {{-- Item 4 --}}
          <div>
            <div class="text-xs text-gray-400 mb-1 uppercase font-bold tracking-wider">Total Pesanan</div>
            <div class="text-lg font-bold text-gray-800">0</div>
            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
              <i class="fas fa-minus text-gray-300"></i> vs kemarin
            </div>
          </div>
          {{-- Item 5 --}}
          <div>
            <div class="text-xs text-gray-400 mb-1 uppercase font-bold tracking-wider">Konversi</div>
            <div class="text-lg font-bold text-gray-800">0%</div>
            <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
              <i class="fas fa-minus text-gray-300"></i> vs kemarin
            </div>
          </div>
        </div>
      </div>

      {{-- 3. BANNER IKLAN --}}
      <div
        class="bg-gradient-to-r from-[#0077b6] to-[#0096c7] rounded-xl shadow-lg p-6 text-white relative overflow-hidden group">
        <div
          class="absolute -right-10 -top-10 bg-white/10 w-40 h-40 rounded-full group-hover:scale-150 transition-transform duration-700">
        </div>
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
          <div>
            <h4 class="font-bold text-xl mb-1"><i class="fas fa-bullhorn mr-2"></i> Mau tokomu makin ramai?</h4>
            <p class="text-blue-100 text-sm opacity-90">Gunakan fitur Iklan PawPaw untuk menjangkau lebih banyak pembeli
              di sekitarmu.</p>
          </div>
          <button
            class="bg-white text-[#0077b6] px-5 py-2.5 rounded-lg text-sm font-bold shadow hover:bg-blue-50 transition whitespace-nowrap">
            Coba Iklan Sekarang
          </button>
        </div>
      </div>

    </div>

    {{-- KOLOM KANAN (SIDEBAR) --}}
    <div class="space-y-6">

      {{-- 1. SKOR TOKO --}}
      <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-24 h-24 bg-green-50 rounded-bl-full -mr-4 -mt-4 z-0"></div>
        <div class="relative z-10">
          <h3 class="text-lg font-bold text-[#0077b6] mb-1">Performa Toko</h3>
          <div class="flex items-end gap-2 mb-2">
            <p class="text-4xl font-bold text-gray-800">100</p>
            <p class="text-sm text-gray-400 mb-1.5">/ 100</p>
          </div>
          <p
            class="text-xs font-bold text-green-600 bg-green-100 inline-flex items-center gap-1 px-2.5 py-1 rounded-full">
            <i class="fas fa-check-circle"></i> Sangat Baik
          </p>
        </div>
      </div>

      {{-- 2. BERITA (Dibuat Empty State Cantik) --}}
      <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6 h-80 flex flex-col">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-lg font-bold text-[#0077b6]">Berita & Info</h3>
          <a href="#" class="text-xs text-[#0077b6] hover:underline font-bold">Lihat Semua</a>
        </div>

        {{-- EMPTY STATE BERITA (Konsisten sama Pesanan) --}}
        <div class="flex-1 flex flex-col items-center justify-center text-center">
          <div class="relative w-20 h-20 mb-4">
            <div class="absolute inset-0 bg-gray-100 rounded-full animate-pulse"></div>
            <div
              class="relative w-20 h-20 bg-white border-2 border-dashed border-gray-200 rounded-full flex items-center justify-center">
              <i class="far fa-newspaper text-2xl text-gray-300"></i>
            </div>
          </div>
          <p class="text-gray-800 font-bold text-sm">Belum ada berita baru</p>
          <p class="text-gray-400 text-xs mt-1 px-4">Informasi pembaruan sistem atau tips berjualan akan muncul di sini.
          </p>
        </div>
      </div>

    </div>

  </div>

</x-layouts.petshop>