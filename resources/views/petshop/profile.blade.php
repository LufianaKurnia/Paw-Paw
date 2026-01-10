<x-layouts.petshop title="Profile & Toko - PawPaw">

  {{-- Notifikasi Sukses/Gagal --}}
  @if(session('success'))
  <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
    <p class="font-bold">Berhasil!</p>
    <p>{{ session('success') }}</p>
  </div>
  @endif

  @if ($errors->any())
  <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm">
    <p class="font-bold">Ada Kesalahan!</p>
    <ul class="list-disc pl-5 mt-1 text-sm">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50">
      <h2 class="text-[#0077b6] font-bold text-2xl">Pengaturan Akun & Toko</h2>
      <p class="text-gray-500 text-sm mt-1">Kelola data pribadi owner dan identitas toko di sini.</p>
    </div>

    {{-- FORM UPDATE --}}
    <form action="{{ route('petshop.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
      @csrf

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- KOLOM KIRI: DATA OWNER (PEMILIK) --}}
        <div class="space-y-6">
          <div class="flex items-center gap-2 border-b pb-2 mb-4">
            <i class="fas fa-user-circle text-[#0077b6] text-xl"></i>
            <h3 class="text-lg font-bold text-gray-700">Data Owner (Pemilik)</h3>
          </div>

          {{-- 1. FOTO PROFIL OWNER --}}
          <div class="flex flex-col items-center gap-4 bg-blue-50 p-6 rounded-xl border border-blue-100">
            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-white shadow-md">
              @if($user->profile_photo)
              <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-full h-full object-cover">
              @else
              <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0077b6&color=fff"
                class="w-full h-full object-cover">
              @endif
            </div>
            <div class="w-full text-center">
              <label class="block text-xs font-bold text-[#0077b6] mb-2 uppercase tracking-wide">Ganti Foto
                Owner</label>
              <input type="file" name="profile_photo"
                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#0077b6] file:text-white hover:file:bg-[#005f8d] cursor-pointer">
              <p class="text-[10px] text-gray-400 mt-2">Muncul di pojok kiri bawah (Sidebar).</p>
            </div>
          </div>

          <div>
            <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#0077b6] outline-none transition"
              required>
          </div>

          <div>
            <label class="block text-gray-700 font-bold mb-2 text-sm">No. Telepon / WA</label>
            <input type="number" name="phone" value="{{ old('phone', $user->phone) }}"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#0077b6] outline-none transition"
              placeholder="08..." required>
          </div>

          <div>
            <label class="block text-gray-400 font-bold mb-2 text-sm">Email (Tidak bisa diubah)</label>
            <input type="email" value="{{ $user->email }}"
              class="w-full border border-gray-200 bg-gray-100 text-gray-400 rounded-lg px-4 py-2 cursor-not-allowed"
              readonly>
          </div>
        </div>

        {{-- KOLOM KANAN: DATA PETSHOP (TOKO) --}}
        <div class="space-y-6">
          <div class="flex items-center gap-2 border-b pb-2 mb-4">
            <i class="fas fa-store text-yellow-500 text-xl"></i>
            <h3 class="text-lg font-bold text-gray-700">Data Petshop (Toko)</h3>
          </div>

          {{-- 2. LOGO --}}
          <div class="flex flex-col gap-4 bg-yellow-50 p-6 rounded-xl border border-yellow-100">
            <div class="w-full h-32 rounded-lg overflow-hidden border-2 border-white shadow-md bg-gray-200 relative">
              {{-- PERBAIKAN: Pakai ?-> --}}
              @if($petshop?->logo)
              <img src="{{ asset('storage/' . $petshop->logo) }}" class="w-full h-full object-cover">
              @else
              <div class="w-full h-full flex items-center justify-center text-gray-400">
                <span class="text-xs">Belum ada logo toko</span>
              </div>
              @endif
            </div>
            <div class="w-full">
              <label class="block text-xs font-bold text-yellow-600 mb-2 uppercase tracking-wide">Ganti Logo
                Toko</label>
              <input type="file" name="logo"
                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-yellow-600 cursor-pointer">
            </div>
          </div>

          {{-- 3. BANNER TOKO --}}
          <div class="flex flex-col gap-4 bg-purple-50 p-6 rounded-xl border border-purple-100">
            <div class="w-full h-32 rounded-lg overflow-hidden border-2 border-white shadow-md bg-gray-200 relative">
              {{-- PERBAIKAN: Pakai ?-> --}}
              @if($petshop?->banner)
              <img src="{{ asset('storage/' . $petshop->banner) }}" class="w-full h-full object-cover">
              @else
              <div class="w-full h-full flex items-center justify-center text-gray-400">
                <span class="text-xs">Belum ada banner</span>
              </div>
              @endif
            </div>
            <div class="w-full">
              <label class="block text-xs font-bold text-purple-600 mb-2 uppercase tracking-wide">Ganti Banner
                Toko</label>
              <input type="file" name="banner"
                class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-purple-500 file:text-white hover:file:bg-purple-600 cursor-pointer">
            </div>
          </div>

          {{-- Input Data Toko --}}
          <div>
            <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Toko</label>
            {{-- PERBAIKAN: Pakai ?-> --}}
            <input type="text" name="nama_toko" value="{{ old('nama_toko', $petshop?->nama_toko ?? '') }}"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 outline-none transition"
              required placeholder="Contoh: PawPaw Store">
          </div>

          <div>
            <label class="block text-gray-700 font-bold mb-2 text-sm">Alamat Lengkap</label>
            {{-- PERBAIKAN: Pakai ?-> --}}
            <textarea name="alamat" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 outline-none transition"
              required placeholder="Alamat petshop...">{{ old('alamat', $petshop?->alamat ?? '') }}</textarea>
          </div>

          <div>
            <label class="block text-gray-700 font-bold mb-2 text-sm">Deskripsi Singkat (Opsional)</label>
            {{-- PERBAIKAN: Pakai ?-> --}}
            <textarea name="deskripsi" rows="2"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 outline-none transition">{{ old('deskripsi', $petshop?->deskripsi ?? '') }}</textarea>
          </div>
        </div>

      </div>

      {{-- TOMBOL SIMPAN --}}
      <div class="mt-12 pt-6 border-t border-gray-100 flex justify-end sticky bottom-0 bg-white pb-4">
        <button type="submit"
          class="bg-[#0077b6] hover:bg-[#005f8d] text-white font-bold py-3 px-10 rounded-full shadow-lg transform transition hover:scale-105 flex items-center gap-2">
          <i class="fas fa-save"></i> Simpan Semua Perubahan
        </button>
      </div>

    </form>
  </div>
</x-layouts.petshop>