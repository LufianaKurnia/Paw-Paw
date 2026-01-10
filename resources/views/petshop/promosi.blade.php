<x-layouts.petshop title="Promosi - Mitra PawPaw">

  <div class="space-y-8">

    {{-- HEADER PROMOSI --}}
    <div
      class="bg-gradient-to-r from-[#0077b6] to-[#00b4d8] rounded-xl p-8 text-white relative overflow-hidden shadow-lg">
      <div class="absolute right-0 top-0 h-full w-1/3 bg-white/10 skew-x-12 transform translate-x-10"></div>
      <div class="relative z-10 max-w-2xl">
        <h2 class="text-2xl font-bold mb-2">Tingkatkan Penjualanmu! 🚀</h2>
        <p class="text-blue-50 opacity-90 mb-6">
          Gunakan berbagai fitur promosi untuk menarik lebih banyak pembeli.
          Toko yang aktif berpromosi rata-rata mengalami kenaikan penjualan hingga 40%.
        </p>
        <button
          class="bg-white text-[#0077b6] px-6 py-2.5 rounded-lg font-bold text-sm shadow-md hover:bg-blue-50 transition">
          <i class="fas fa-plus-circle mr-1"></i> Buat Promo Baru
        </button>
      </div>
      <div class="absolute right-10 bottom-0 text-9xl opacity-10 rotate-12">
        <i class="fas fa-tags"></i>
      </div>
    </div>

    {{-- ALAT PROMOSI (Tampilan Menu) --}}
    <div class="space-y-4">
      <div class="flex items-center justify-between">
        <h3 class="text-[#0077b6] font-bold text-xl">Alat Promosi Toko</h3>
        <span class="text-xs text-gray-400">Pilih jenis promosi yang kamu inginkan</span>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div
          class="bg-white border border-gray-200 p-6 rounded-xl hover:shadow-md hover:border-blue-300 transition-all group cursor-pointer">
          <div class="flex items-start justify-between mb-4">
            <div
              class="bg-orange-50 w-12 h-12 rounded-lg flex items-center justify-center text-orange-500 group-hover:bg-orange-500 group-hover:text-white transition-colors">
              <i class="fas fa-ticket-alt text-xl"></i>
            </div>
            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full">Populer</span>
          </div>
          <h4 class="font-bold text-gray-800 mb-1 group-hover:text-[#0077b6]">Voucher Toko</h4>
          <p class="text-sm text-gray-500 mb-4 h-10">Buat voucher diskon atau cashback khusus untuk pelanggan tokomu.
          </p>
          <div
            class="text-[#0077b6] text-sm font-bold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
            Buat Sekarang <i class="fas fa-chevron-right text-xs"></i>
          </div>
        </div>


        <div
          class="bg-white border border-gray-200 p-6 rounded-xl hover:shadow-md hover:border-blue-300 transition-all group cursor-pointer">
          <div class="flex items-start justify-between mb-4">
            <div
              class="bg-blue-50 w-12 h-12 rounded-lg flex items-center justify-center text-[#0077b6] group-hover:bg-[#0077b6] group-hover:text-white transition-colors">
              <i class="fas fa-boxes text-xl"></i>
            </div>
          </div>
          <h4 class="font-bold text-gray-800 mb-1 group-hover:text-[#0077b6]">Paket Diskon</h4>
          <p class="text-sm text-gray-500 mb-4 h-10">Jual gabungan produk (bundling) dengan harga lebih hemat.</p>
          <div
            class="text-[#0077b6] text-sm font-bold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
            Buat Sekarang <i class="fas fa-chevron-right text-xs"></i>
          </div>
        </div>


        <div
          class="bg-white border border-gray-200 p-6 rounded-xl hover:shadow-md hover:border-blue-300 transition-all group cursor-pointer relative overflow-hidden">
          <div class="absolute top-3 right-3">
            <i class="fas fa-bolt text-gray-100 text-6xl transform rotate-12"></i>
          </div>
          <div class="relative z-10">
            <div class="flex items-start justify-between mb-4">
              <div
                class="bg-yellow-50 w-12 h-12 rounded-lg flex items-center justify-center text-yellow-500 group-hover:bg-yellow-400 group-hover:text-white transition-colors">
                <i class="fas fa-bolt text-xl"></i>
              </div>
            </div>
            <h4 class="font-bold text-gray-800 mb-1 group-hover:text-[#0077b6]">Flash Sale Toko</h4>
            <p class="text-sm text-gray-500 mb-4 h-10">Berikan diskon kilat terbatas waktu untuk menarik pembeli
              impulsif.</p>
            <div
              class="text-[#0077b6] text-sm font-bold flex items-center gap-1 group-hover:translate-x-1 transition-transform">
              Buat Sekarang <i class="fas fa-chevron-right text-xs"></i>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
        <h2 class="text-[#0077b6] font-bold text-lg">Promo Saya</h2>


        <div class="flex bg-gray-100 p-1 rounded-lg text-xs font-medium">
          <button class="bg-white text-gray-800 shadow-sm px-3 py-1.5 rounded-md">Berjalan</button>
          <button class="text-gray-500 px-3 py-1.5 hover:text-gray-700">Akan Datang</button>
          <button class="text-gray-500 px-3 py-1.5 hover:text-gray-700">Selesai</button>
        </div>
      </div>


      <div class="p-12 flex flex-col items-center justify-center text-center">
        <div class="bg-gray-50 w-24 h-24 rounded-full flex items-center justify-center mb-4 relative">
          <i class="fas fa-percentage text-4xl text-gray-300"></i>
          <div class="absolute top-0 right-0 bg-white rounded-full p-1 border border-gray-100 shadow-sm">
            <i class="fas fa-search text-gray-400 text-xs"></i>
          </div>
        </div>
        <h3 class="text-gray-800 font-bold mb-2">Belum Ada Promo Aktif</h3>
        <p class="text-gray-500 text-sm max-w-sm mb-6">
          Kamu belum membuat promosi apapun. Yuk buat Voucher Toko pertamamu sekarang!
        </p>
        <button
          class="px-5 py-2 bg-[#0077b6] text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm">
          + Buat Promo
        </button>
      </div>
    </div>


    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-[#0077b6] font-bold text-lg">Event PawPaw (Campaign)</h2>
      </div>

      <div class="p-8">
        <div
          class="border-2 border-dashed border-gray-200 rounded-xl p-8 flex flex-col md:flex-row items-center gap-6 bg-gray-50/50">
          <div
            class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0 text-[#0077b6] rotate-3 shadow-sm">
            <i class="fas fa-calendar-star text-3xl"></i>
          </div>
          <div class="flex-1 text-center md:text-left">
            <h3 class="text-gray-800 font-bold text-lg">Nantikan Event Mendatang!</h3>
            <p class="text-gray-500 text-sm mt-1">
              Saat ini belum ada kampanye aktif yang bisa diikuti.
              Cek halaman ini secara berkala untuk bergabung dalam event besar PawPaw (seperti Harbolnas, Pet Fair,
              dll).
            </p>
          </div>
          <button class="text-gray-400 font-bold text-sm bg-gray-200 px-4 py-2 rounded-lg cursor-not-allowed" disabled>
            Belum Tersedia
          </button>
        </div>
      </div>
    </div>

  </div>

</x-layouts.petshop>