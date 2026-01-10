<x-layouts.petshop title="Pesanan - Mitra PawPaw">

  {{-- 1. WRAPPER UTAMA (Kita taruh Logic Data disini) --}}
  <div x-data="{
      activeTab: 'belum_bayar',
      orders: {{ Js::from($orders) }},

      // Logic Filter: Cek pesanan berdasarkan status tab aktif
      get filteredOrders() {
          if (this.orders.length === 0) return [];
          return this.orders.filter(order => order.status === this.activeTab);
      }
  }" class="w-full">

    {{-- ========================================================= --}}
    {{-- 2. HEADER TAB --}}
    {{-- ========================================================= --}}
    <div class="flex flex-wrap space-x-1 border-b border-gray-200 w-full px-4 md:px-0">

      <button @click="activeTab = 'belum_bayar'" :class="activeTab === 'belum_bayar'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
        class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Belum Bayar
      </button>

      <button @click="activeTab = 'perlu_dikirim'" :class="activeTab === 'perlu_dikirim'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
        class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Perlu Dikirim
      </button>

      <button @click="activeTab = 'dikirim'" :class="activeTab === 'dikirim'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
        class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Dikirim
      </button>

      <button @click="activeTab = 'selesai'" :class="activeTab === 'selesai'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
        class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Selesai
      </button>

      <button @click="activeTab = 'pengembalian'" :class="activeTab === 'pengembalian'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
        class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Pengembalian/Pembatalan
      </button>
    </div>
    {{-- ========================================================= --}}

    {{-- 2. KONTAINER UTAMA --}}
    <div class="bg-white border border-gray-200 rounded-b-xl rounded-tr-xl shadow-sm p-6 md:p-8 min-h-[500px] relative">

      {{-- SKENARIO A: JIKA ADA DATA --}}
      <template x-if="filteredOrders.length > 0">
        <div class="overflow-x-auto animate-pop">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="text-gray-400 border-b border-gray-100 uppercase text-xs tracking-wider">
                <th class="py-4 font-bold">Produk / Layanan</th>
                <th class="py-4 font-bold">Pelanggan</th>
                <th class="py-4 font-bold">Tanggal</th>
                <th class="py-4 font-bold">Total</th>
                <th class="py-4 font-bold text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <template x-for="item in filteredOrders" :key="item.id">
                <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors group">
                  <td class="py-4">
                    <div class="flex items-center gap-3">
                      <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-[#0077b6]">
                        <i class="fas fa-paw"></i>
                      </div>
                      <div>
                        <p class="font-bold text-gray-800" x-text="item.product"></p>
                        <p class="text-xs text-gray-400" x-text="item.id"></p>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 text-sm font-medium" x-text="item.customer"></td>
                  <td class="py-4 text-sm text-gray-500" x-text="item.date"></td>
                  <td class="py-4 font-bold text-[#0077b6]" x-text="item.price"></td>
                  <td class="py-4 text-center">
                    <button
                      class="px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-100 text-[#0077b6] hover:bg-[#0077b6] hover:text-white transition-all">
                      Detail
                    </button>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </template>

      {{-- SKENARIO B: JIKA TIDAK ADA DATA --}}
      <template x-if="filteredOrders.length === 0">
        <div class="flex flex-col items-center justify-center h-full min-h-[400px] animate-pop px-4">

          {{-- ILUSTRASI ICON CSS (Anti Broken Image) --}}
          <div class="relative w-32 h-32 mb-6 group cursor-default">
            {{-- Efek Denyut Belakang --}}
            <div class="absolute inset-0 bg-blue-100 rounded-full animate-ping opacity-75"></div>

            {{-- Lingkaran Utama --}}
            <div
              class="relative w-32 h-32 bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-full flex items-center justify-center shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
              {{-- Ikon Box Open --}}
              <i
                class="fas fa-box-open text-5xl text-[#0077b6]/80 drop-shadow-sm transform group-hover:-translate-y-2 group-hover:scale-110 transition-all duration-300 ease-out"></i>
            </div>

            {{-- Elemen Dekorasi Kecil (Tanda Tanya) --}}
            <div
              class="absolute -top-2 -right-2 bg-yellow-400 w-9 h-9 rounded-full flex items-center justify-center shadow-lg border-2 border-white animate-bounce"
              style="animation-duration: 2s;">
              <i class="fas fa-search text-white text-sm"></i>
            </div>
          </div>

          {{-- TEXT TYPOGRAPHY --}}
          <h3 class="text-2xl font-bold text-gray-800 mb-3 tracking-tight">
            Belum Ada Pesanan
          </h3>

          <div class="text-center max-w-sm mx-auto space-y-2">
            <p class="text-gray-500 text-sm leading-relaxed">
              Saat ini belum ada data transaksi masuk pada status
              <span
                class="inline-block px-2 py-0.5 rounded bg-blue-50 text-[#0077b6] font-bold text-xs uppercase tracking-wide border border-blue-100"
                x-text="activeTab.replace('_', ' ')"></span>
            </p>
            <p class="text-gray-400 text-xs italic">
              "Pesanan pelanggan akan muncul otomatis di sini secara realtime."
            </p>
          </div>

          {{-- TOMBOL REFRESH --}}
          <button @click="window.location.reload()"
            class="mt-8 group relative px-6 py-2.5 rounded-xl bg-white text-gray-500 text-sm font-bold border border-gray-200 shadow-sm hover:shadow-md hover:border-blue-300 hover:text-[#0077b6] transition-all duration-200">
            <span class="flex items-center gap-2">
              <i class="fas fa-sync-alt group-hover:rotate-180 transition-transform duration-700"></i>
              Cek Pembaruan
            </span>
          </button>

        </div>
      </template>

    </div>
  </div>

</x-layouts.petshop>