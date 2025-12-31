<x-layouts.petshop title="Dashboard - PawPaw">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-blue-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-[#0077b6]">Yang Perlu Dilakukan</h3>
                </div>
                <div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                    <div class="cursor-pointer hover:bg-blue-50 p-2 rounded transition">
                        <div class="text-3xl font-bold text-gray-700">0</div>
                        <div class="text-xs text-blue-500 font-medium mt-1">Pengiriman Perlu Diproses</div>
                    </div>
                    <div class="cursor-pointer hover:bg-blue-50 p-2 rounded transition">
                        <div class="text-3xl font-bold text-gray-700">0</div>
                        <div class="text-xs text-blue-500 font-medium mt-1">Pengiriman Telah Diproses</div>
                    </div>
                    <div class="cursor-pointer hover:bg-blue-50 p-2 rounded transition">
                        <div class="text-3xl font-bold text-gray-700">0</div>
                        <div class="text-xs text-blue-500 font-medium mt-1">Pengembalian / Pembatalan</div>
                    </div>
                    <div class="cursor-pointer hover:bg-blue-50 p-2 rounded transition">
                        <div class="text-3xl font-bold text-gray-700">0</div>
                        <div class="text-xs text-blue-500 font-medium mt-1">Produk Diblokir</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-blue-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-[#0077b6]">Performa Toko</h3>
                </div>
                <div class="p-6 grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Penjualan</div>
                        <div class="text-lg font-bold text-gray-800">Rp0</div>
                        <div class="text-xs text-gray-400 mt-1">-0,00%</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Total Pengunjung</div>
                        <div class="text-lg font-bold text-gray-800">0</div>
                        <div class="text-xs text-gray-400 mt-1">-0,00%</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Produk Diklik</div>
                        <div class="text-lg font-bold text-gray-800">0</div>
                        <div class="text-xs text-gray-400 mt-1">-0,00%</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Pesanan</div>
                        <div class="text-lg font-bold text-gray-800">0</div>
                        <div class="text-xs text-gray-400 mt-1">-0,00%</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Konversi</div>
                        <div class="text-lg font-bold text-gray-800">0,00%</div>
                        <div class="text-xs text-gray-400 mt-1">-0,00%</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6">
                <h3 class="text-lg font-bold text-[#0077b6] mb-4">Iklan PawPaw</h3>
                <div class="border border-blue-200 bg-blue-50 rounded-lg p-5">
                    <h4 class="font-bold text-gray-800">Maksimalkan Penjualanmu dengan Iklan PawPaw</h4>
                    <p class="text-sm text-gray-600 mt-2 mb-4">Pelajari lebih lanjut tentang cara terbaik mengiklankan dan buat iklanmu lebih terjangkau.</p>
                    <div class="text-right">
                        <button class="bg-white border border-blue-500 text-blue-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white transition">Pelajari Lebih Lanjut</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6">
                <h3 class="text-lg font-bold text-[#0077b6] mb-2">Performa Toko</h3>
                <p class="text-2xl font-bold text-gray-800 mb-1">Sangat baik</p>
                <p class="text-xs text-green-600 bg-green-100 inline-block px-2 py-1 rounded">Semua kriteria memenuhi target</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-blue-100 p-6 h-80 flex flex-col">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-[#0077b6]">Berita</h3>
                    <a href="#" class="text-xs text-blue-500 hover:underline">Lainnya ></a>
                </div>
                <div class="flex-1 flex items-center justify-center text-gray-400 text-sm">
                    Belum ada berita baru
                </div>
            </div>

        </div>

    </div>

</x-layouts.petshop>