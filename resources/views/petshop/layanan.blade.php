<x-layouts.petshop title="Layanan - PawPaw">

  <div x-data="{
        activeTab: 'grooming',

        // Mode: list, add, edit
        petshopMode: '{{ $errors->any() ? 'add' : 'list' }}',
        groomingMode: 'list',

        // Delete Modal
        showDeleteModal: false,
        deleteUrl: '',
        deleteMessage: '',

        // Edit Data Holder (Produk & Grooming Sharing Variable)
        editId: '',
        editName: '',
        editCategory: '',
        editPetType: '', // Khusus Grooming
        editPrice: '',
        editStock: '',
        editDesc: '',
        editImageUrl: '',
        updateUrl: '',

        confirmDelete(url, name) {
            this.deleteUrl = url;
            this.deleteMessage = 'Apakah Anda yakin ingin menghapus ' + name + '?';
            this.showDeleteModal = true;
        },

        // Fungsi Edit Produk (Barang)
        editProduct(data, url, imgUrl) {
            this.petshopMode = 'edit';
            this.editId = data.id;
            this.editName = data.name;
            this.editCategory = data.category;
            this.editPrice = data.price;
            this.editStock = data.stock;
            this.editDesc = data.description;
            this.editImageUrl = imgUrl;
            this.updateUrl = url;
        },

        // Fungsi Edit Grooming (Jasa)
        editGrooming(data, url) {
            this.groomingMode = 'edit';
            this.editId = data.id;
            this.editName = data.name;
            this.editPetType = data.pet_type;
            this.editPrice = data.price;
            this.updateUrl = url;
        }
    }" class="w-full relative">

    {{-- TAB NAVIGASI --}}
    <div class="flex space-x-2 border-b border-gray-200 w-full px-4 md:px-0">
      <button @click="activeTab = 'grooming'"
        :class="activeTab === 'grooming' ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10' : 'bg-transparent text-gray-500 hover:text-gray-700 border-transparent hover:bg-gray-50'"
        class="px-8 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        Grooming
      </button>
      <button @click="activeTab = 'petshop'"
        :class="activeTab === 'petshop' ? 'bg-white text-[#0077b6] border-l border-t border-r border-gray-200 rounded-t-xl -mb-px font-bold z-10' : 'bg-transparent text-gray-500 hover:text-gray-700 border-transparent hover:bg-gray-50'"
        class="px-8 py-3 text-sm transition-all duration-200 border-b-0 relative top-[1px]">
        PetShop
      </button>
    </div>

    <div class="bg-white border border-gray-200 rounded-b-xl rounded-tr-xl shadow-sm p-6 min-h-[600px]">

      {{-- HEADER TOKO --}}
      <div class="flex flex-col md:flex-row gap-6 items-start border-b border-gray-100 pb-8 mb-8">
        <div
          class="w-full md:w-64 h-40 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0 relative border border-gray-200">


          @if($petshop?->banner)
          <img src="{{ asset('storage/' . $petshop->banner) }}" class="w-full h-full object-cover">
          @else
          <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-200">
            <i class="fas fa-image text-3xl mb-2"></i>
            <span class="text-xs">Belum ada banner</span>
          </div>
          @endif

        </div>
        <div class="flex-1 w-full">

          <h2 class="text-2xl font-bold text-[#0077b6]">{{ $petshop?->nama_toko ?? 'Nama Petshop Belum Diatur' }}</h2>

          <div class="flex items-center text-yellow-400 text-sm mt-2">
            @php
            $rating = $petshop?->rating ?? 0;
            @endphp

            @foreach(range(1, 5) as $i)
            @if($rating >= $i)
            <i class="fas fa-star"></i>
            @elseif($rating >= $i - 0.5)
            {{-- Bintang Setengah --}}
            <i class="fas fa-star-half-alt"></i>
            @else
            <i class="far fa-star"></i>
            @endif
            @endforeach

            <span class="text-[#0077b6] font-bold ml-2">{{ number_format($rating, 1, ',', '.') }}</span>
          </div>


          <div class="mt-4 text-sm text-gray-600 space-y-2">
            <p class="flex items-center"><i class="fas fa-map-marker-alt text-[#0077b6] w-6"></i>
              {{ $petshop?->alamat ?? 'Alamat belum diatur' }}
            </p>
          </div>
        </div>
      </div>

      {{-- ================= TAB GROOMING ================= --}}
      <div x-show="activeTab === 'grooming'" class="space-y-10" style="display: none;">

        {{-- LIST LAYANAN GROOMING --}}
        <div x-show="groomingMode === 'list'">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-[#0077b6]">Daftar Harga & Layanan</h3>
            <button @click="groomingMode = 'add'"
              class="bg-[#0077b6] text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm">
              + Tambah Layanan Baru
            </button>
          </div>

          {{-- Tabel Layanan --}}
          <div class="border border-[#0077b6] rounded-lg overflow-hidden mb-8">
            <table class="w-full text-left border-collapse">
              <thead class="bg-blue-50 border-b border-[#0077b6]">
                <tr>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Nama Layanan</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Jenis Hewan</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Harga</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6] text-right">Aksi</th>
                </tr>
              </thead>
              <tbody class="text-sm text-gray-700 divide-y divide-blue-100 bg-white">
                @forelse($services as $service)
                <tr class="hover:bg-blue-50/30 transition">
                  <td class="p-4 font-medium text-[#0077b6]">{{ $service->name }}</td>
                  <td class="p-4"><span
                      class="bg-blue-100 text-[#0077b6] px-2 py-1 rounded text-xs font-bold">{{ $service->pet_type }}</span>
                  </td>
                  <td class="p-4 font-bold">Rp{{ number_format($service->price, 0, ',', '.') }}</td>
                  <td class="p-4 text-right">
                    <div class="flex justify-end gap-3">
                      <button
                        @click="editGrooming({{ $service }}, '{{ route('petshop.layanan.grooming.update', $service->id) }}')"
                        class="text-[#0077b6] hover:underline font-bold text-xs">
                        Ubah
                      </button>
                      <button
                        @click="confirmDelete('{{ route('petshop.layanan.grooming.destroy', $service->id) }}', '{{ $service->name }}')"
                        class="text-red-400 hover:text-red-600 hover:underline text-xs">
                        Hapus
                      </button>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="p-8 text-center bg-gray-50 text-gray-400">
                    Belum ada layanan grooming.
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{-- Tabel Riwayat Grooming --}}
          <div class="mt-8">
            <h3 class="text-lg font-bold text-[#0077b6] mb-4">Riwayat Layanan Grooming</h3>
            <div class="border border-gray-200 rounded-lg overflow-hidden">
              <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                  <tr>
                    <th class="p-4 text-sm font-bold text-gray-600">Jenis Hewan</th>
                    <th class="p-4 text-sm font-bold text-gray-600">Nama Layanan</th>
                    <th class="p-4 text-sm font-bold text-gray-600">Tanggal</th>
                    <th class="p-4 text-sm font-bold text-gray-600">Catatan</th>
                    <th class="p-4 text-sm font-bold text-gray-600 text-right">Harga</th>
                  </tr>
                </thead>
                <tbody class="text-sm text-gray-700 divide-y divide-gray-100 bg-white">
                  @forelse($groomingHistory as $history)

                  <tr>
                    <td class="p-4">{{ $history->pet_type }}</td>
                    <td class="p-4 text-[#0077b6]">{{ $history->service_name }}</td>
                    <td class="p-4 text-gray-500">{{ $history->created_at->format('d-m-Y') }}</td>
                    <td class="p-4 text-gray-500">-</td>
                    <td class="p-4 text-right font-bold">Rp{{ number_format($history->price, 0, ',', '.') }}</td>
                  </tr>
                  @empty

                  <tr>
                    <td class="p-4 text-gray-400">-</td>
                    <td class="p-4 text-gray-400">-</td>
                    <td class="p-4 text-gray-400">-</td>
                    <td class="p-4 text-gray-400">-</td>
                    <td class="p-4 text-right text-gray-400">-</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

        {{-- FORM ADD GROOMING --}}
        <div x-show="groomingMode === 'add'" style="display: none;">
          <h3 class="text-lg font-bold text-[#0077b6] mb-6">Tambah Layanan Grooming</h3>

          <form action="{{ route('petshop.layanan.grooming.store') }}" method="POST">
            @csrf
            <div class="space-y-6 max-w-4xl">
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Nama Layanan</label>
                <input type="text" name="name" required placeholder="Contoh: Full Grooming"
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
              </div>

              {{-- BAGIAN JENIS HEWAN DIPERSIMPEL (HANYA KUCING & ANJING) --}}
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Jenis Hewan (Pilih)</label>
                <select name="pet_type" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50 bg-white">
                  <option value="" disabled selected>-- Pilih Jenis Hewan --</option>
                  <option value="Kucing">Kucing</option>
                  <option value="Anjing">Anjing</option>
                  <option value="Hamster">Hamster</option>
                  <option value="Kelinci">Kelinci</option>
                </select>
              </div>

              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Harga (Rp)</label>
                <input type="number" name="price" required placeholder="100000"
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
              </div>
            </div>
            <div class="flex justify-end gap-3 mt-12 pt-4">
              <button type="button" @click="groomingMode = 'list'"
                class="px-6 py-2 rounded-lg border border-[#0077b6] text-[#0077b6] font-medium text-sm hover:bg-blue-50">Kembali</button>
              <button type="submit"
                class="px-6 py-2 rounded-lg bg-[#90e0ef] text-white font-medium text-sm hover:bg-[#0077b6]">Simpan
                Layanan</button>
            </div>
          </form>
        </div>

        {{-- FORM EDIT GROOMING --}}
        <div x-show="groomingMode === 'edit'" style="display: none;">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-[#0077b6]"><i
                class="fas fa-edit"></i></div>
            <h3 class="text-lg font-bold text-[#0077b6]">Ubah Layanan Grooming</h3>
          </div>

          <form :action="updateUrl" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-4xl">
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Nama Layanan</label>
                <input type="text" name="name" x-model="editName" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
              </div>

              {{-- BAGIAN EDIT JENIS HEWAN --}}
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Jenis Hewan</label>
                <select name="pet_type" x-model="editPetType" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50 bg-white">
                  <option value="Kucing">Kucing</option>
                  <option value="Anjing">Anjing</option>
                </select>
              </div>

              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Harga (Rp)</label>
                <input type="number" name="price" x-model="editPrice" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
              </div>
            </div>
            <div class="flex justify-end gap-3 mt-12 pt-4">
              <button type="button" @click="groomingMode = 'list'"
                class="px-6 py-2 rounded-lg border border-[#0077b6] text-[#0077b6] font-medium text-sm hover:bg-blue-50">Batal</button>
              <button type="submit"
                class="px-6 py-2 rounded-lg bg-[#0077b6] text-white font-medium text-sm hover:bg-blue-700">Simpan
                Perubahan</button>
            </div>
          </form>
        </div>
      </div>

      {{-- ================= TAB PETSHOP (PRODUK) ================= --}}
      <div x-show="activeTab === 'petshop'" class="space-y-6" style="display: none;">

        {{-- LIST PRODUK --}}
        <div x-show="petshopMode === 'list'">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-[#0077b6]">Daftar Produk PetShop</h3>
            <button @click="petshopMode = 'add'"
              class="bg-[#0077b6] text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-sm">
              + Tambah Produk Baru
            </button>
          </div>

          {{-- Table Petshop --}}
          <div class="border border-blue-200 rounded-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
              <thead class="bg-white border-b border-blue-100">
                <tr>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Produk</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Harga</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6]">Stok</th>
                  <th class="p-4 text-sm font-bold text-[#0077b6] text-right">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-blue-50">
                @forelse($products as $product)
                <tr class="hover:bg-blue-50/30 transition">
                  <td class="p-4">
                    <div class="flex gap-4">
                      <div class="w-14 h-14 bg-gray-100 rounded border border-gray-200 overflow-hidden">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                        @else
                        <img src="https://placehold.co/100x100?text=No+Img"
                          class="w-full h-full object-cover opacity-50">
                        @endif
                      </div>
                      <div>
                        <p class="font-bold text-[#0077b6] text-sm">{{ $product->name }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $product->category }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="p-4 align-top font-bold text-[#0077b6] text-sm">
                    Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                  <td class="p-4 align-top text-gray-600 text-sm font-medium">{{ $product->stock }}</td>
                  <td class="p-4 align-top text-right text-sm">
                    <div class="flex flex-col gap-1 items-end">
                      <button type="button" @click="editProduct(
                                                    {{ $product }},
                                                    '{{ route('petshop.layanan.update', $product->id) }}',
                                                    '{{ $product->image ? asset('storage/' . $product->image) : '' }}'
                                                )" class="text-[#0077b6] hover:underline font-medium">
                        Ubah
                      </button>
                      <button type="button"
                        @click="confirmDelete('{{ route('petshop.layanan.destroy', $product->id) }}', '{{ $product->name }}')"
                        class="text-red-400 hover:text-red-600 hover:underline text-xs">
                        Hapus
                      </button>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="p-8 text-center text-gray-400">
                    <p class="italic">Belum ada produk.</p>
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        {{-- FORM ADD PRODUCT --}}
        <div x-show="petshopMode === 'add'" style="display: none;">
          <h3 class="text-lg font-bold text-[#0077b6] mb-6">Tambah Produk Baru</h3>
          <form action="{{ route('petshop.layanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6 max-w-4xl">
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Nama Produk</label>
                <input type="text" name="name" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
              </div>

              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Kategori Produk</label>
                <select name="category" required
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50 bg-white">
                  <option value="" disabled selected>-- Pilih Kategori --</option>
                  <option value="Makanan">Makanan</option>
                  <option value="Mainan">Mainan</option>
                  <option value="Obat">Obat</option>
                  <option value="Aksesoris">Aksesoris</option>
                  <option value="Pakaian">Pakaian</option>
                  <option value="Peralatan">Peralatan</option>
                </select>
              </div>

              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Deskripsi Produk <span
                    class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                <textarea name="description" rows="3"
                  class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50"></textarea>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-[#0077b6] font-bold mb-2 text-sm">Harga (Rp)</label>
                  <input type="number" name="price" required
                    class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
                </div>
                <div>
                  <label class="block text-[#0077b6] font-bold mb-2 text-sm">Stok</label>
                  <input type="number" name="stock" required
                    class="w-full border border-[#0077b6] rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#0077b6]/50">
                </div>
              </div>
              <div>
                <label class="block text-[#0077b6] font-bold mb-2 text-sm">Upload Gambar</label>
                <input type="file" name="image"
                  class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#0077b6] hover:file:bg-blue-100">
              </div>
            </div>
            <div class="flex justify-end gap-3 mt-12 pt-4">
              <button type="button" @click="petshopMode = 'list'"
                class="px-6 py-2 rounded-lg border border-[#0077b6] text-[#0077b6] font-medium text-sm">Kembali</button>
              <button type="submit"
                class="px-6 py-2 rounded-lg bg-[#90e0ef] text-white font-medium text-sm hover:bg-[#0077b6] transition">Simpan
                Produk</button>
            </div>
          </form>
        </div>

        {{-- FORM EDIT PRODUCT --}}
        <div x-show="petshopMode === 'edit'" style="display: none;">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500"><i
                class="fas fa-edit"></i></div>
            <h3 class="text-lg font-bold text-gray-800">Ubah Data Produk</h3>
          </div>

          <form :action="updateUrl" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6 max-w-4xl">
              <div>
                <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Produk</label>
                <input type="text" name="name" x-model="editName" required
                  class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
              </div>

              <div>
                <label class="block text-gray-700 font-bold mb-2 text-sm">Kategori Produk</label>
                <select name="category" x-model="editCategory" required
                  class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300 bg-white">
                  <option value="Makanan">Makanan</option>
                  <option value="Mainan">Mainan</option>
                  <option value="Obat">Obat</option>
                  <option value="Aksesoris">Aksesoris</option>
                  <option value="Pakaian">Pakaian</option>
                  <option value="Peralatan">Peralatan</option>
                </select>
              </div>

              <div>
                <label class="block text-gray-700 font-bold mb-2 text-sm">Deskripsi Produk <span
                    class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                <textarea name="description" x-model="editDesc" rows="3"
                  class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300"></textarea>
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-gray-700 font-bold mb-2 text-sm">Harga (Rp)</label>
                  <input type="number" name="price" x-model="editPrice" required
                    class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>
                <div>
                  <label class="block text-gray-700 font-bold mb-2 text-sm">Stok</label>
                  <input type="number" name="stock" x-model="editStock" required
                    class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>
              </div>

              <div>
                <label class="block text-gray-700 font-bold mb-2 text-sm">Ganti Gambar (Opsional)</label>
                <div class="flex items-center gap-4">
                  <template x-if="editImageUrl">
                    <img :src="editImageUrl" class="w-16 h-16 rounded border border-gray-300 object-cover">
                  </template>
                  <input type="file" name="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-500 hover:file:bg-orange-100">
                </div>
              </div>
            </div>
            <div class="flex justify-end gap-3 mt-12 pt-4 border-t border-gray-100">
              <button type="button" @click="petshopMode = 'list'"
                class="px-6 py-2 rounded-lg border border-gray-300 text-gray-600 font-bold text-sm hover:bg-gray-50">Batal</button>
              <button type="submit"
                class="px-6 py-2 rounded-lg bg-orange-400 text-white font-bold text-sm hover:bg-orange-500 shadow-lg shadow-orange-200 transition">Simpan
                Perubahan</button>
            </div>
          </form>
        </div>

      </div>
    </div>

    {{-- MODAL DELETE --}}
    <div x-show="showDeleteModal" style="display: none;"
      class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50">
      <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden relative"
        @click.away="showDeleteModal = false">
        <div class="bg-red-50 p-6 flex items-center gap-4 border-b border-red-100">
          <div
            class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0 text-red-500 text-xl">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <div>
            <h3 class="text-lg font-bold text-red-600">Konfirmasi Hapus</h3>
            <p class="text-sm text-red-400">Tindakan ini tidak dapat dibatalkan.</p>
          </div>
        </div>
        <div class="p-6">
          <p class="text-gray-600" x-text="deleteMessage"></p>
        </div>
        <div class="p-6 pt-0 flex justify-end gap-3">
          <button @click="showDeleteModal = false"
            class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-500 font-bold text-sm hover:bg-gray-50 transition">Batal</button>
          <form :action="deleteUrl" method="POST">@csrf @method('DELETE')<button type="submit"
              class="px-5 py-2.5 rounded-xl bg-red-500 text-white font-bold text-sm hover:bg-red-600 shadow-lg shadow-red-500/30 transition">Ya,
              Hapus</button></form>
        </div>
      </div>
    </div>

  </div>
</x-layouts.petshop>