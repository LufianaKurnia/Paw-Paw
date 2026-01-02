<x-layouts.petshop title="Pesanan - Mitra PawPaw">

    <div x-data="{ activeTab: 'belum_bayar' }" class="w-full">

        <div class="flex flex-wrap space-x-1 border-b border-gray-200 w-full px-4 md:px-0">

            <button
                @click="activeTab = 'belum_bayar'"
                :class="activeTab === 'belum_bayar'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
                class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Belum Bayar
            </button>

            <button
                @click="activeTab = 'perlu_dikirim'"
                :class="activeTab === 'perlu_dikirim'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
                class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Perlu Dikirim
            </button>

            <button
                @click="activeTab = 'dikirim'"
                :class="activeTab === 'dikirim'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
                class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Dikirim
            </button>

            <button
                @click="activeTab = 'selesai'"
                :class="activeTab === 'selesai'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
                class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Selesai
            </button>

             <button
                @click="activeTab = 'pengembalian'"
                :class="activeTab === 'pengembalian'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10 shadow-[0_-2px_3px_-1px_rgba(0,0,0,0.05)]'
                    : 'bg-transparent text-[#0077b6] hover:text-blue-800 border-transparent hover:bg-blue-50'"
                class="px-4 md:px-6 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Pengembalian/Pembatalan
            </button>
        </div>

        <div class="bg-white border border-gray-200 rounded-b-xl rounded-tr-xl shadow-sm p-6 md:p-8 min-h-[600px]">

            <div x-show="activeTab === 'belum_bayar'" class="space-y-6">
                <div class="border border-gray-300 p-6 rounded-lg">
                    <div class="flex flex-col md:flex-row justify-between items-start mb-4">
                        <h3 class="text-orange-400 font-bold text-lg mb-2 md:mb-0">Menunggu Pembayaran</h3>
                        <div class="text-left md:text-right">
                            <h4 class="text-[#0077b6] font-bold text-lg">#PP123456</h4>
                            <p class="text-xs text-[#0077b6] mt-1">Tanggal Pesanan: 12 Nov 2025, 12:40 WIB</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-[200px_1fr] gap-y-2 mb-6">
                        <div class="font-bold text-orange-400 text-sm md:text-base">Nama Pelanggan:</div>
                        <div class="font-bold text-[#0077b6] text-sm md:text-base">Novi Putriandini</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Alamat:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">Jl. Siliwangi No. 10, Sumedang Utara</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Total Item:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">1 Produk</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Metode Pembayaran:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">Transfer Bank (BCA)</div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-end border-t border-gray-100 pt-4 mt-2">
                        <div class="text-red-600 font-bold text-sm md:text-base w-full md:w-auto mb-2 md:mb-0">
                            Batas Waktu: 13 Nov 2025, 08:00 WIB
                        </div>
                        <div class="text-[#0077b6] font-bold text-lg">
                            Total Pembayaran: Rp88.500
                        </div>
                    </div>
                </div>

                <div class="border border-gray-300 p-6 rounded-lg">
                    <div class="flex flex-col md:flex-row justify-between items-start mb-4">
                        <h3 class="text-orange-400 font-bold text-lg mb-2 md:mb-0">Menunggu Pembayaran</h3>
                        <div class="text-left md:text-right">
                            <h4 class="text-[#0077b6] font-bold text-lg">#PP123245</h4>
                            <p class="text-xs text-[#0077b6] mt-1">Tanggal Pesanan: 12 Nov 2025, 08:00 WIB</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-[200px_1fr] gap-y-2 mb-6">
                        <div class="font-bold text-orange-400 text-sm md:text-base">Nama Pelanggan:</div>
                        <div class="font-bold text-[#0077b6] text-sm md:text-base">Putri Handayani</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Alamat:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">Jl. Angkrek No. 32</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Total Item:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">2 Produk</div>
                        <div class="font-bold text-orange-400 text-sm md:text-base">Metode Pembayaran:</div>
                        <div class="text-[#0077b6] text-sm md:text-base">OVO</div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between items-end border-t border-gray-100 pt-4 mt-2">
                        <div class="text-red-600 font-bold text-sm md:text-base w-full md:w-auto mb-2 md:mb-0">
                            Batas Waktu: 12 Nov 2025, 23:59 WIB
                        </div>
                        <div class="text-[#0077b6] font-bold text-lg">
                            Total Pembayaran: Rp179.249
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'perlu_dikirim'" class="space-y-6" style="display: none;">

                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="font-bold text-[#0077b6] text-lg mb-1">Perlu Diproses Segera</h3>
                    <h4 class="font-bold text-gray-700 text-lg mb-1">Pesanan #PP123456</h4>
                    <p class="text-xs text-[#0077b6] font-semibold mb-6">Sensitive Stomach & skin (1)</p>

                    <div class="flex flex-col md:flex-row justify-between items-center mt-4">
                        <div class="text-[#0077b6] font-bold text-xl mb-4 md:mb-0">Total: Rp88.500</div>
                        <div class="flex gap-2">
                            <button class="bg-[#0077b6] text-white px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-800 transition">Atur Pengiriman</button>
                            <button class="border border-[#0077b6] text-[#0077b6] px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-50 transition">Cetak Resi</button>
                        </div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="font-bold text-green-600 text-lg mb-1">Siap Diambil Kurir</h3>
                    <h4 class="font-bold text-gray-700 text-lg mb-1">Pesanan #PP123321</h4>
                    <p class="text-xs text-[#0077b6] font-semibold mb-6">Cat Food Premium</p>

                    <div class="flex flex-col md:flex-row justify-between items-center mt-4">
                        <div class="text-[#0077b6] font-bold text-xl mb-4 md:mb-0">Total: Rp73.999</div>
                        <div class="flex gap-2">
                            <button class="bg-[#0077b6] text-white px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-800 transition">Cetak Pesanan</button>
                            <button class="border border-[#0077b6] text-[#0077b6] px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-50 transition">Hubungi Pelanggan</button>
                        </div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg p-6">
                    <h3 class="font-bold text-red-600 text-lg mb-1">Menunggu Penjemputan</h3>
                    <h4 class="font-bold text-gray-700 text-lg mb-1">Pesanan #PP123245</h4>
                    <div class="text-xs text-[#0077b6] font-semibold mb-6 space-y-1">
                        <p>• Makanan Kucing - Whiskas Junior Ocean Fish 1.1 Kg</p>
                        <p>• Pinkzoo food</p>
                    </div>

                    <div class="flex flex-col md:flex-row justify-between items-center mt-4">
                        <div class="text-[#0077b6] font-bold text-xl mb-4 md:mb-0">Total: Rp179.249</div>
                        <div class="flex gap-2">
                            <button class="bg-[#0077b6] text-white px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-800 transition">Atur Pengiriman Ulang</button>
                            <button class="border border-[#0077b6] text-[#0077b6] px-6 py-2 rounded-full font-semibold text-sm hover:bg-blue-50 transition">Batalkan Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'dikirim'" class="space-y-8" style="display: none;">

                <div class="relative">
                    <input type="text" placeholder="Cari Nomor Resi / Nama Pelanggan" class="w-full border border-gray-400 rounded-full px-6 py-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400">
                    <i class="fas fa-search absolute right-6 top-4 text-gray-400"></i>
                </div>

                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-[#0077b6] text-lg">#PP123321</span>
                            <span class="text-[#0077b6] text-sm">13/11/2025, 19:00 WIB</span>
                        </div>

                        <div class="bg-gray-100 border border-gray-200 rounded p-4 flex items-center gap-4 mb-4">
                            <div class="w-16 h-8 bg-white border border-gray-300 flex items-center justify-center rounded">
                                <span class="text-blue-900 font-bold italic text-sm">JNE</span>
                                <span class="text-red-600 font-bold italic text-xs ml-0.5">Express</span>
                            </div>
                            <span class="font-mono font-bold text-gray-600 text-lg tracking-wide">JNE1234567890</span>
                        </div>

                        <div class="flex flex-col md:flex-row justify-between items-end">
                            <div>
                                <p class="text-xs text-[#0077b6] font-bold mb-3">Dikirim ke Putra Pratama - Sumedang</p>
                                <div class="flex gap-2">
                                    <button class="bg-[#0077b6] text-white px-5 py-2 rounded-full font-bold text-xs hover:bg-blue-800 transition uppercase">Lacak Detail Resi</button>
                                    <button class="border border-gray-300 text-gray-500 px-5 py-2 rounded-full font-bold text-xs hover:bg-gray-50 transition uppercase">Hubungi Pelanggan</button>
                                </div>
                            </div>
                            <div class="font-bold text-[#0077b6] text-lg mt-4 md:mt-0">
                                Rp73.999 / 1 item
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'selesai'" class="space-y-4" style="display: none;">

                <div class="border border-gray-300 rounded-lg p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-bold text-[#0077b6] text-lg">#PP123456</span>
                        <span class="font-bold text-[#0077b6] text-sm md:text-base">Novi Putriandini</span>
                    </div>
                    <div class="text-xs text-[#0077b6] mb-3">2025-15-11 13:45</div>
                    <div class="text-sm text-[#0077b6] font-bold mb-4">Sensitive Stomach & skin</div>

                    <div class="flex justify-between items-end">
                        <div class="flex items-center gap-2 text-green-600 font-bold">
                            <i class="fas fa-check-circle text-xl"></i>
                            <span>Selesai</span>
                        </div>
                        <div class="text-[#0077b6] font-bold text-lg">Total: Rp88.500</div>
                    </div>
                </div>

                 <div class="border border-gray-300 rounded-lg p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-bold text-[#0077b6] text-lg">#PP123245</span>
                        <span class="font-bold text-[#0077b6] text-sm md:text-base">Putri Handayani</span>
                    </div>
                    <div class="text-xs text-[#0077b6] mb-3">2025-14-11 10:05</div>
                    <div class="text-sm text-[#0077b6] font-bold mb-4">
                        <p>• Makanan Kucing - Whiskas Junior Ocean Fish 1.1 Kg</p>
                        <p>• Pinkzoo food</p>
                    </div>

                    <div class="flex justify-between items-end">
                        <div class="flex items-center gap-2 text-green-600 font-bold">
                            <i class="fas fa-check-circle text-xl"></i>
                            <span>Selesai</span>
                        </div>
                        <div class="text-[#0077b6] font-bold text-lg">Total: Rp179.249</div>
                    </div>
                </div>

                 <div class="border border-gray-300 rounded-lg p-6">
                    <div class="flex justify-between items-start mb-2">
                        <span class="font-bold text-[#0077b6] text-lg">#PP123321</span>
                        <span class="font-bold text-[#0077b6] text-sm md:text-base">Putra Pratama</span>
                    </div>
                    <div class="text-xs text-[#0077b6] mb-3">2025-14-11 09:45</div>
                    <div class="text-sm text-[#0077b6] font-bold mb-4">Cat Food Premium</div>

                    <div class="flex justify-between items-end">
                        <div class="flex items-center gap-2 text-green-600 font-bold">
                            <i class="fas fa-check-circle text-xl"></i>
                            <span>Selesai</span>
                        </div>
                        <div class="text-[#0077b6] font-bold text-lg">Total: Rp179.249</div>
                    </div>
                </div>

            </div>

            <div x-show="activeTab === 'pengembalian'" class="space-y-6" style="display: none;">

                <div class="space-y-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-[#0077b6] font-medium mr-2 text-sm">Prioritas</span>
                        <button class="bg-[#0077b6] text-white px-4 py-1.5 rounded-full text-xs font-bold">Semua</button>
                        <button class="bg-white border border-[#0077b6] text-[#0077b6] px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-50">Kurang dari 1 hari</button>
                        <button class="bg-white border border-[#0077b6] text-[#0077b6] px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-50">Kurang dari 2 hari</button>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-[#0077b6] font-medium mr-9 text-sm">Aksi</span>
                        <button class="bg-white border border-[#0077b6] text-[#0077b6] px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-50">Perlu diskusi</button>
                        <button class="bg-white border border-[#0077b6] text-[#0077b6] px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-50">Kirim bukti</button>
                        <button class="bg-white border border-[#0077b6] text-[#0077b6] px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-50">Perlu dicek penjual</button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" placeholder="Cari Pengajuan" class="border border-[#0077b6] rounded px-4 py-2 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-blue-300">
                        <input type="text" placeholder="Semua Aksi" class="border border-[#0077b6] rounded px-4 py-2 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-blue-300">
                    </div>

                    <div class="flex items-center gap-3">
                        <button class="bg-[#0077b6] text-white px-6 py-2 rounded text-sm font-bold hover:bg-blue-800 transition">Terapkan</button>
                        <button class="border border-[#0077b6] text-[#0077b6] px-6 py-2 rounded text-sm font-bold hover:bg-blue-50 transition">Atur Ulang</button>
                        <a href="#" class="text-[#0077b6] text-xs md:text-sm hover:underline ml-2">Lihat lebih banyak ></a>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-[#0077b6] font-bold text-lg mb-4">1 Pengguna</h3>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <table class="w-full text-left">
                            <thead class="bg-[#7dbccf] text-white">
                                <tr>
                                    <th class="p-4 text-sm font-medium">Produk</th>
                                    <th class="p-4 text-sm font-medium">Jumlah</th>
                                    <th class="p-4 text-sm font-medium">Alasan Pengajuan</th>
                                    <th class="p-4 text-sm font-medium">Solusi Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr class="bg-white">
                                    <td class="p-4">
                                        <div class="flex gap-3">
                                            <div class="w-16 h-16 bg-gray-100 rounded overflow-hidden flex-shrink-0">
                                                <img src="https://placehold.co/100x100/png?text=Whiskas" class="w-full h-full object-cover">
                                            </div>
                                            <div class="text-[#0077b6] text-xs font-bold max-w-[150px]">
                                                Makanan Kucing - Whiskas Junior Ocean Fish 1.1 Kg
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-[#0077b6] font-bold text-sm align-top pt-6">1</td>
                                    <td class="p-4 text-[#0077b6] text-xs align-top pt-6 max-w-[150px]">
                                        Menemukan harga yang lebih murah di toko lain
                                    </td>
                                    <td class="p-4 text-[#0077b6] text-xs align-top pt-6 max-w-[150px]">
                                        Dana dikembalikan ke pembeli
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-layouts.petshop>