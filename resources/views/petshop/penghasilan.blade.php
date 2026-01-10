<x-layouts.petshop title="Penghasilan Saya - PawPaw">

  <div class="space-y-6">


    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden relative">

      <div
        class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-blue-50 rounded-full opacity-50 z-0 pointer-events-none">
      </div>

      <div class="p-6 relative z-10">
        <div class="flex justify-between items-start mb-4">
          <h2 class="text-[#0077b6] font-bold text-lg flex items-center gap-2">
            <i class="fas fa-chart-line"></i> Informasi Penghasilan
          </h2>
          <button class="text-xs text-gray-400 hover:text-[#0077b6]">
            <i class="fas fa-info-circle"></i> Info Selengkapnya
          </button>
        </div>

        <div class="bg-blue-50/80 border border-blue-100 rounded-lg p-4 mb-8 flex gap-3 items-start">
          <i class="fas fa-info-circle text-[#0077b6] mt-0.5"></i>
          <p class="text-sm text-gray-600 leading-relaxed">
            Nominal <strong>"Pending"</strong> dan <strong>"Sudah Dilepas"</strong> belum termasuk potongan admin/biaya
            layanan.
            Cek <a href="#" class="text-[#0077b6] underline font-medium">Laporan Penghasilan</a> untuk rincian lengkap.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto_2fr] gap-8 items-center">


          <div class="group cursor-default">
            <h3 class="text-gray-500 font-semibold mb-2 text-sm uppercase tracking-wide flex items-center gap-2">
              Pending <i class="fas fa-hourglass-half text-orange-400 text-xs"></i>
            </h3>
            <div class="flex items-baseline gap-1">
              <span class="text-sm text-gray-400 font-bold">Rp</span>
              <p class="text-3xl font-bold text-gray-800 group-hover:text-[#0077b6] transition-colors">0</p>
            </div>
            <p class="text-xs text-gray-400 mt-1">Dana ditahan sementara</p>
          </div>

          <div class="hidden md:block w-px h-20 bg-gradient-to-b from-transparent via-gray-200 to-transparent"></div>

          <div>
            <h3 class="text-gray-500 font-semibold mb-4 text-sm uppercase tracking-wide flex items-center gap-2">
              Sudah Dilepas <i class="fas fa-check-circle text-green-500 text-xs"></i>
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
              <div class="group">
                <p class="text-gray-400 text-xs mb-1">Minggu Ini</p>
                <p class="text-xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">Rp 0</p>
              </div>
              <div class="group">
                <p class="text-gray-400 text-xs mb-1">Bulan Ini</p>
                <p class="text-xl font-bold text-gray-700 group-hover:text-[#0077b6] transition">Rp 0</p>
              </div>
              <div class="group">
                <p class="text-gray-400 text-xs mb-1">Total Akumulasi</p>
                <p class="text-xl font-bold text-[#0077b6]">Rp 0</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="border-t border-gray-100 bg-gray-50 px-6 py-3 flex justify-between items-center relative z-10">
        <span class="text-xs text-gray-400">Update otomatis setiap pesanan selesai.</span>
        <a href="#"
          class="text-[#0077b6] font-bold text-sm hover:text-blue-800 flex items-center gap-2 transition-colors">
          Lihat Saldo Penjual <i class="fas fa-arrow-right text-xs"></i>
        </a>
      </div>
    </div>


    <div x-data="{ activeTab: 'pending' }"
      class="bg-white rounded-xl shadow-sm border border-gray-200 min-h-[500px] flex flex-col">


      <div class="p-6 pb-0 border-b border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
          <h2 class="text-[#0077b6] font-bold text-lg">Rincian Transaksi</h2>

          <div class="relative w-full md:w-64 group">
            <input type="text" placeholder="Cari No. Pesanan..."
              class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:border-[#0077b6] focus:ring-2 focus:ring-blue-50 text-sm transition-all">
            <div
              class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#0077b6] transition-colors">
              <i class="fas fa-search"></i>
            </div>
          </div>
        </div>

        <div class="flex gap-8">
          <button @click="activeTab = 'pending'" class="relative pb-4 px-1 text-sm font-bold transition-all"
            :class="activeTab === 'pending' ? 'text-[#0077b6]' : 'text-gray-400 hover:text-gray-600'">
            Dana Pending
            {{-- Garis Bawah Aktif --}}
            <div x-show="activeTab === 'pending'"
              class="absolute bottom-0 left-0 w-full h-0.5 bg-[#0077b6] rounded-t-full" x-transition></div>
          </button>

          <button @click="activeTab = 'sudah_dilepas'" class="relative pb-4 px-1 text-sm font-bold transition-all"
            :class="activeTab === 'sudah_dilepas' ? 'text-[#0077b6]' : 'text-gray-400 hover:text-gray-600'">
            Dana Dilepas
            <div x-show="activeTab === 'sudah_dilepas'"
              class="absolute bottom-0 left-0 w-full h-0.5 bg-[#0077b6] rounded-t-full" x-transition></div>
          </button>
        </div>
      </div>


      <div class="flex-1 p-6 flex flex-col items-center justify-center">


        <div x-show="activeTab === 'pending'" x-transition.opacity.duration.300ms class="text-center max-w-sm">
          <div class="bg-orange-50 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
            <i class="fas fa-hourglass-half text-4xl text-orange-400"></i>
          </div>
          <h3 class="text-gray-800 font-bold text-lg mb-2">Belum Ada Dana Pending</h3>
          <p class="text-gray-500 text-sm">
            Dana dari pesanan baru akan muncul di sini. Dana akan ditahan sementara sampai pesanan diterima pelanggan.
          </p>
        </div>


        <div x-show="activeTab === 'sudah_dilepas'" x-transition.opacity.duration.300ms class="text-center max-w-sm"
          style="display: none;">
          <div class="bg-green-50 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
            <i class="fas fa-wallet text-4xl text-green-500"></i>
          </div>
          <h3 class="text-gray-800 font-bold text-lg mb-2">Belum Ada Dana Dilepas</h3>
          <p class="text-gray-500 text-sm">
            Penghasilan dari pesanan yang sudah selesai akan otomatis masuk ke Saldo Penjual dan muncul di sini.
          </p>
          <button
            class="mt-6 px-4 py-2 bg-white border border-gray-200 text-[#0077b6] text-sm font-bold rounded-lg hover:bg-blue-50 transition">
            <i class="fas fa-download mr-1"></i> Download Laporan
          </button>
        </div>

      </div>

    </div>

  </div>

</x-layouts.petshop>