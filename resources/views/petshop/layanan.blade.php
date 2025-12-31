<x-layouts.petshop title="Layanan - PawPaw">

    <div x-data="{ activeTab: 'grooming', selected: [] }" class="w-full">

        <div class="flex space-x-2 border-b border-gray-200 w-full px-4 md:px-0">

            <button
                @click="activeTab = 'grooming'"
                :class="activeTab === 'grooming'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10'
                    : 'bg-transparent text-gray-500 hover:text-gray-700 border-transparent hover:bg-gray-50'"
                class="px-8 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                Grooming
            </button>

            <button
                @click="activeTab = 'petshop'"
                :class="activeTab === 'petshop'
                    ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10'
                    : 'bg-transparent text-gray-500 hover:text-gray-700 border-transparent hover:bg-gray-50'"
                class="px-8 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
                PetShop
            </button>
        </div>

        <div class="bg-white border border-gray-200 rounded-b-xl rounded-tr-xl shadow-sm p-6 min-h-[500px]">

            <div x-show="activeTab === 'grooming'" class="space-y-8">

                <div class="flex flex-col md:flex-row gap-6 items-start border-b border-gray-100 pb-8">
                    <div class="w-full md:w-64 h-40 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0 relative border border-gray-200">
                        <img src="https://placehold.co/600x400/png?text=Ello+Petshop" class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1 w-full">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold text-[#0077b6]">Ello PetShop Sumedang</h2>
                                <div class="flex items-center text-yellow-400 text-sm mt-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-[#0077b6] font-bold ml-2">4,5</span>
                                    <span class="text-gray-400 ml-1 text-xs">(250+ review)</span>
                                </div>
                                <div class="mt-4 text-sm text-gray-600 space-y-2">
                                    <p class="flex items-center"><i class="fas fa-map-marker-alt text-gray-400 w-6"></i>Jl. Angkrek no. 138, Sumedang</p>
                                </div>
                            </div>
                            <button class="bg-[#0077b6] text-white text-xs px-3 py-2 rounded hover:bg-blue-700 transition">
                                <i class="fas fa-map-marker-alt mr-1"></i> Lihat di Maps
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-[#0077b6]">Daftar Layanan Grooming</h3>
                        <button class="bg-[#0077b6] text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm">
                            + Tambah Layanan Baru
                        </button>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50">
                                <tr class="border-b border-gray-200">
                                    <th class="p-4 text-sm font-bold text-[#0077b6]">Jenis Hewan</th>
                                    <th class="p-4 text-sm font-bold text-[#0077b6]">Nama Layanan</th>
                                    <th class="p-4 text-sm font-bold text-[#0077b6]">Tanggal</th>
                                    <th class="p-4 text-sm font-bold text-[#0077b6]">Catatan</th>
                                    <th class="p-4 text-sm font-bold text-[#0077b6] text-right">Harga</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="p-4">Kucing</td>
                                    <td class="p-4 text-[#0077b6] font-medium">Full Grooming</td>
                                    <td class="p-4">15-11-2025</td>
                                    <td class="p-4">-</td>
                                    <td class="p-4 text-right font-bold text-[#0077b6]">Rp125.000</td>
                                </tr>
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="p-4">Anjing</td>
                                    <td class="p-4 text-[#0077b6] font-medium">Mandi Kutu</td>
                                    <td class="p-4">16-11-2025</td>
                                    <td class="p-4">Bawa Shampo Sendiri</td>
                                    <td class="p-4 text-right font-bold text-[#0077b6]">Rp150.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'petshop'" class="space-y-6" style="display: none;">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-[#0077b6]">Daftar Layanan Grooming</h3> <button class="bg-[#0077b6] text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm">
                        + Tambah Produk Baru
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-6">
                    <div class="md:col-span-3">
                        <input type="text" placeholder="Cari Nama Produk" class="border border-blue-300 rounded px-4 py-2 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-blue-300 text-gray-600">
                    </div>
                    <div class="md:col-span-3 relative">
                        <input type="text" placeholder="Kategori" class="border border-blue-300 rounded px-4 py-2 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-blue-300 text-gray-600">
                        <i class="fas fa-pen absolute right-3 top-2.5 text-gray-400 text-xs"></i>
                    </div>
                    <div class="md:col-span-3">
                        <input type="text" placeholder="Performa Produk" class="border border-blue-300 rounded px-4 py-2 text-sm w-full focus:outline-none focus:ring-1 focus:ring-blue-500 placeholder-blue-300 text-gray-600">
                    </div>
                    <div class="md:col-span-3 flex justify-end gap-2">
                        <button class="border border-blue-300 text-[#0077b6] px-4 py-2 rounded text-sm hover:bg-blue-50 font-medium bg-white">Terapkan</button>
                        <button class="border border-blue-300 text-[#0077b6] px-4 py-2 rounded text-sm hover:bg-blue-50 font-medium bg-white">Atur Ulang</button>
                    </div>
                </div>

                <div class="border border-blue-200 rounded-lg overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-white border-b border-blue-100">
                            <tr>
                                <th class="p-4 w-10">
                                    <input type="checkbox"
                                        @change="selected = $el.checked ? [1, 2, 3, 4] : []"
                                        :checked="selected.length === 4"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 cursor-pointer">
                                </th>
                                <th class="p-4 text-sm font-bold text-[#0077b6]">Produk</th>
                                <th class="p-4 text-sm font-bold text-[#0077b6]">Harga</th>
                                <th class="p-4 text-sm font-bold text-[#0077b6]">Stok</th>
                                <th class="p-4 text-sm font-bold text-[#0077b6] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-50">

                            <tr class="hover:bg-blue-50/30 transition group">
                                <td class="p-4 align-top">
                                    <input type="checkbox" value="1" x-model="selected" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 mt-1 cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-4">
                                        <div class="w-14 h-14 bg-gray-100 rounded border border-gray-200 flex-shrink-0 overflow-hidden">
                                            <img src="https://placehold.co/100x100/png?text=Whiskas" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#0077b6] text-sm group-hover:underline cursor-pointer">Makanan Kucing - Whiskas Junior Ocean Fish 1.1 Kg</p>
                                            <p class="text-xs text-gray-400 mt-1">ID Produk: 23322114567</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 align-top font-bold text-[#0077b6] text-sm">Rp67.250</td>
                                <td class="p-4 align-top text-gray-600 text-sm font-medium">200</td>
                                <td class="p-4 align-top text-right">
                                    <div class="flex flex-col items-end space-y-1 text-sm">
                                        <button class="text-[#0077b6] hover:underline">Ubah</button>
                                        <button class="text-[#38bdf8] hover:underline">Iklankan</button>
                                        <button class="text-[#0077b6] hover:underline">Lainnya</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/30 transition group">
                                <td class="p-4 align-top">
                                    <input type="checkbox" value="2" x-model="selected" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 mt-1 cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-4">
                                        <div class="w-14 h-14 bg-gray-100 rounded border border-gray-200 flex-shrink-0 overflow-hidden">
                                            <img src="https://placehold.co/100x100/png?text=Cat+Food" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#0077b6] text-sm group-hover:underline cursor-pointer">Cat Food Premium</p>
                                            <p class="text-xs text-gray-400 mt-1">ID Produk: 23322114842</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 align-top font-bold text-[#0077b6] text-sm">Rp73.999</td>
                                <td class="p-4 align-top text-gray-600 text-sm font-medium">82</td>
                                <td class="p-4 align-top text-right">
                                    <div class="flex flex-col items-end space-y-1 text-sm">
                                        <button class="text-[#0077b6] hover:underline">Ubah</button>
                                        <button class="text-[#38bdf8] hover:underline">Iklankan</button>
                                        <button class="text-[#0077b6] hover:underline">Lainnya</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/30 transition group">
                                <td class="p-4 align-top">
                                    <input type="checkbox" value="3" x-model="selected" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 mt-1 cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-4">
                                        <div class="w-14 h-14 bg-gray-100 rounded border border-gray-200 flex-shrink-0 overflow-hidden">
                                            <img src="https://placehold.co/100x100/png?text=Pinkzoo" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#0077b6] text-sm group-hover:underline cursor-pointer">Pinkzoo food</p>
                                            <p class="text-xs text-gray-400 mt-1">ID Produk: 23322114544</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 align-top font-bold text-[#0077b6] text-sm">Rp111.999</td>
                                <td class="p-4 align-top text-gray-600 text-sm font-medium">346</td>
                                <td class="p-4 align-top text-right">
                                    <div class="flex flex-col items-end space-y-1 text-sm">
                                        <button class="text-[#0077b6] hover:underline">Ubah</button>
                                        <button class="text-[#38bdf8] hover:underline">Iklankan</button>
                                        <button class="text-[#0077b6] hover:underline">Lainnya</button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/30 transition group">
                                <td class="p-4 align-top">
                                    <input type="checkbox" value="4" x-model="selected" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 mt-1 cursor-pointer">
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-4">
                                        <div class="w-14 h-14 bg-gray-100 rounded border border-gray-200 flex-shrink-0 overflow-hidden">
                                            <img src="https://placehold.co/100x100/png?text=Royal" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#0077b6] text-sm group-hover:underline cursor-pointer">Sensitive Stomach & Skin</p>
                                            <p class="text-xs text-gray-400 mt-1">ID Produk: 23322114104</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 align-top font-bold text-[#0077b6] text-sm">Rp88.500</td>
                                <td class="p-4 align-top text-gray-600 text-sm font-medium">36</td>
                                <td class="p-4 align-top text-right">
                                    <div class="flex flex-col items-end space-y-1 text-sm">
                                        <button class="text-[#0077b6] hover:underline">Ubah</button>
                                        <button class="text-[#38bdf8] hover:underline">Iklankan</button>
                                        <button class="text-[#0077b6] hover:underline">Lainnya</button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</x-layouts.petshop>