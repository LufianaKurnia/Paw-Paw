<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Masuk & Daftar Mitra - PawPaw</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
  body {
    font-family: 'Quicksand', sans-serif;
    overscroll-behavior: none;
  }

  [x-cloak] {
    display: none !important;
  }

  .bg-pawpaw {
    background: linear-gradient(180deg, #60a5fa 0%, #93c5fd 40%, #bfdbfe 100%);
  }

  .h-dvh {
    height: 100vh;
    height: 100dvh;
  }

  /* Animasi Partikel - Diperlambat floatnya */
  .particle {
    position: absolute;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    animation: floatParticle 15s infinite linear;
    /* Diperlambat dari 10s ke 15s */
  }

  @keyframes floatParticle {
    0% {
      transform: translateY(0) translateX(0);
      opacity: 0;
    }

    50% {
      opacity: 1;
    }

    100% {
      transform: translateY(-100vh) translateX(50px);
      opacity: 0;
    }
  }

  @keyframes float {

    0%,
    100% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-20px);
    }
  }

  .floating-anim {
    animation: float 8s ease-in-out infinite;
    /* Diperlambat dari 6s ke 8s */
  }

  @keyframes popIn {
    0% {
      transform: scale(0.5);
      opacity: 0;
      filter: blur(10px);
    }

    100% {
      transform: scale(1);
      opacity: 1;
      filter: blur(0);
    }
  }

  /* Animasi Pop Logo Diperlambat */
  .animate-pop {
    animation: popIn 2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    /* 1s -> 2s */
  }

  /* Custom Duration Classes untuk Tailwind */
  .duration-1500 {
    transition-duration: 1500ms;
  }

  .duration-2000 {
    transition-duration: 2000ms;
  }

  .delay-400 {
    transition-delay: 400ms;
  }

  .ease-elastic {
    transition-timing-function: cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  .ease-out-expo {
    transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
  }

  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  </style>
</head>

<body class="h-dvh w-full overflow-hidden bg-white" x-data="{
          step: 'splash',
          mouseX: 0,
          mouseY: 0,
          showLoginPass: false,
          showRegPass: false,
          init() {
              const hasRegError = {{ $errors->has('name') || $errors->has('phone') ? 'true' : 'false' }};
              const hasLoginError = {{ $errors->any() && !$errors->has('name') ? 'true' : 'false' }};
              const hasSuccess = {{ session('success') ? 'true' : 'false' }};

              if (hasRegError) {
                  this.step = 'register';
              } else if (hasLoginError || hasSuccess) {
                  this.step = 'login';
              } else {
                  // Splash screen delay diperlama sedikit agar logo terbaca
                  setTimeout(() => { this.step = 'welcome'; }, 3000);
              }
          }
      }" @mousemove="window.innerWidth > 768 ? (mouseX = $event.clientX, mouseY = $event.clientY) : null">

  <div class="w-full h-full relative flex flex-col md:flex-row">

    {{-- 1. SPLASH SCREEN --}}
    {{-- Diperlambat: duration-1000 -> duration-2000 --}}
    <div x-show="step === 'splash'" x-transition:leave="transition ease-in-out duration-2000"
      x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-110 blur-xl"
      class="fixed inset-0 z-[100] bg-pawpaw flex flex-col items-center justify-center pointer-events-none">

      <div class="particle w-2 h-2 top-[80%] left-[20%]"></div>
      <div class="particle w-3 h-3 top-[90%] left-[60%] delay-1000"></div>

      <div class="animate-pop flex flex-col items-center">
        <img src="{{ asset('images/logo-pawpaw-white.png') }}"
          class="w-48 h-48 md:w-64 md:h-64 object-contain drop-shadow-2xl">
        <h1 class="text-5xl md:text-7xl font-bold text-white mt-4 tracking-wider drop-shadow-lg">PawPaw</h1>
        <p class="text-white text-lg md:text-xl mt-2 font-medium tracking-[0.3em] opacity-80">MITRA DASHBOARD</p>
      </div>
    </div>

    {{-- 2. BACKGROUND (VISUAL) --}}
    {{-- Diperlambat: duration-700 -> duration-1500 --}}
    <div class="absolute inset-0 md:relative md:w-7/12 lg:w-2/3 bg-pawpaw overflow-hidden transition-all duration-700">
      {{-- Mouse Follow Effect --}}
      <div
        class="hidden md:block absolute w-[500px] h-[500px] bg-white/10 rounded-full blur-[100px] pointer-events-none transition-transform duration-75 ease-out"
        :style="`transform: translate(${mouseX - 250}px, ${mouseY - 250}px)`"></div>

      <div
        class="absolute inset-0 flex flex-col items-center justify-center p-8 z-10 transition-all duration-700 ease-elastic"
        :class="(step === 'login' || step === 'register') ? 'opacity-0 translate-y-[-100px] md:opacity-100 md:translate-y-0' : ''">

        <div
          class="floating-anim relative w-64 h-64 md:w-[28rem] md:h-[28rem] transition-transform duration-200 ease-out"
          :style="window.innerWidth > 768 ? `transform: translate(${mouseX * 0.02}px, ${mouseY * 0.02}px)` : ''">
          <img src="{{ asset('images/kucing-awan.png') }}" class="w-full h-full object-contain drop-shadow-2xl">
        </div>


        {{-- Teks Intro --}}
        {{-- Diperlambat: duration-300 -> duration-700 --}}
        <div class="mt-4 md:mt-6 text-center text-white relative transition-opacity duration-700"
          :class="(step === 'login' || step === 'register') ? 'opacity-0 md:opacity-100' : 'opacity-100'">
          <h2 class="text-2xl md:text-4xl font-bold leading-tight drop-shadow-lg hidden md:block">Satu
            Sentuhan,<br>Seribu Goyangan Ekor</h2>
          <p class="mt-4 text-sm md:text-lg opacity-90 hidden md:block">Kelola layanan petshop Anda dengan mudah.</p>
        </div>
      </div>
    </div>

    {{-- 3. INTERFACE AREA (FORM) --}}

    {{-- A. STEP WELCOME --}}
    {{-- Diperlambat: duration-700 -> duration-1000, delay-300 -> delay-400 --}}
    <div
      class="absolute inset-0 md:relative md:w-5/12 lg:w-1/3 flex flex-col justify-end md:justify-center items-center z-10 pointer-events-none md:pointer-events-auto md:bg-white/90 md:backdrop-blur-xl">

      <div class="w-full max-w-md px-0 md:px-12 relative pointer-events-auto">

        {{-- A. STEP WELCOME --}}
        {{-- Diperlambat: duration-700 -> duration-1000, delay-300 -> delay-400 --}}
        <div x-show="step === 'welcome'" x-cloak x-transition:enter="transition ease-out-expo duration-1000 delay-400"
          x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
          class="text-center md:text-left p-8 mb-12 md:mb-0">
          <h3 class="text-white md:text-gray-800 text-3xl font-bold mb-4 drop-shadow-md md:drop-shadow-none">Halo,
            Mitra!</h3>
          <p class="text-blue-50 md:text-gray-500 mb-8 drop-shadow md:drop-shadow-none">Siap mengelola pesanan hari
            ini?</p>
          <button @click="step = 'choice'"
            class="w-full bg-white md:bg-[#0077b6] text-[#0077b6] md:text-white font-bold py-4 rounded-2xl shadow-xl md:shadow-lg hover:scale-[1.02] transition-all flex justify-center items-center gap-2 group">
            Memulai <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
          </button>
        </div>


        {{-- B. STEP CHOICE --}}
        {{-- Diperlambat: duration-500 -> duration-1000 (Masuk), duration-300 -> duration-700 (Keluar) --}}
        <div x-show="step === 'choice'" x-cloak x-transition:enter="transition ease-out-expo duration-500"
          x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
          class="bg-white rounded-t-[2.5rem] md:rounded-none p-8 pb-12 md:pb-0 shadow-[0_-10px_40px_rgba(0,0,0,0.1)] md:shadow-none w-full flex flex-col gap-4">

          <div class="w-12 h-1.5 bg-gray-200 rounded-full mx-auto mb-2 md:hidden"></div>
          <div class="hidden md:block mb-8 text-center text-blue-200"><i class="fas fa-paw text-6xl animate-bounce"></i>
          </div>

          <button @click="step = 'login'"
            class="w-full bg-[#0077b6] text-white font-bold py-4 rounded-xl shadow-lg hover:-translate-y-1 transition-all">Masuk
            Akun</button>
          <button @click="step = 'register'"
            class="w-full bg-white border-2 border-gray-100 text-gray-600 font-bold py-4 rounded-xl hover:bg-gray-50 transition-all">Daftar
            Mitra Baru</button>
          <button @click="step = 'welcome'"
            class="text-gray-400 md:text-gray-400 text-sm mt-4 hover:underline text-center pb-4 md:pb-0">Kembali</button>
        </div>

        {{-- C. FORM LOGIN --}}
        {{-- Diperlambat: duration-500 -> duration-1000 --}}
        <div x-show="step === 'login'" x-cloak x-transition:enter="transition ease-out-expo duration-700"
          x-transition:enter-start="opacity-0 translate-y-20" x-transition:enter-end="opacity-100 translate-y-0"
          class="bg-white rounded-t-[2.5rem] md:rounded-2xl p-8 shadow-[0_-10px_40px_rgba(0,0,0,0.1)] md:shadow-none w-full">

          <div class="w-12 h-1.5 bg-gray-200 rounded-full mx-auto mb-6 md:hidden"></div>

          <div class="mb-6">
            <h2 class="text-2xl font-bold text-[#0077b6]">Selamat Datang!</h2>
            <p class="text-gray-400 text-sm">Masuk ke dashboard mitra Anda.</p>
          </div>

          @if(session('success'))
          <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-xs flex items-center gap-2">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
          </div>
          @endif

          <form action="{{ route('petshop.authenticate') }}" method="POST" class="space-y-4">
            @csrf
            @if($errors->any() && !$errors->has('name'))
            <div class="text-red-500 text-xs bg-red-50 p-2 rounded border border-red-100 flex items-center gap-2">
              <i class="fas fa-exclamation-circle"></i> Email atau password salah.
            </div>
            @endif

            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Email</label>
              <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-3.5 text-blue-300"></i>
                <input type="email" name="email" value="{{ old('email') }}" required
                  class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 pl-10 pr-4 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
              </div>
            </div>

            <div>
              <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Kata Sandi</label>
              <div class="relative">
                <i class="fas fa-lock absolute left-4 top-3.5 text-blue-300"></i>
                <input :type="showLoginPass ? 'text' : 'password'" name="password" required
                  class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 pl-10 pr-12 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                <button type="button" @click="showLoginPass = !showLoginPass"
                  class="absolute right-4 top-3.5 text-gray-400 hover:text-blue-500">
                  <i class="fas" :class="showLoginPass ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
              </div>
            </div>

            <button type="submit"
              class="w-full bg-[#0077b6] text-white font-bold py-4 rounded-xl shadow-lg hover:bg-blue-700 transition-all">Masuk
              Sekarang</button>
          </form>

          <div class="mt-6 text-center">
            <p class="text-xs text-gray-400">Belum jadi mitra? <button @click="step = 'register'"
                class="text-[#0077b6] font-bold hover:underline">Daftar</button></p>
          </div>
          <button @click="step = 'choice'" class="absolute top-8 right-8 text-gray-300 hover:text-gray-500 p-2"><i
              class="fas fa-times text-xl"></i></button>
        </div>

        {{-- D. FORM REGISTER --}}
        {{-- Diperlambat: duration-500 -> duration-1000 --}}
        <div x-show="step === 'register'" x-cloak x-transition:enter="transition ease-out-expo duration-700"
          x-transition:enter-start="opacity-0 translate-y-20" x-transition:enter-end="opacity-100 translate-y-0"
          class="bg-white rounded-t-[2.5rem] md:rounded-2xl shadow-[0_-10px_40px_rgba(0,0,0,0.15)] md:shadow-none w-full h-[90dvh] md:h-auto absolute bottom-0 md:relative flex flex-col">

          <div class="p-8 pb-2 flex-none">
            <div class="w-12 h-1.5 bg-gray-200 rounded-full mx-auto mb-6 md:hidden"></div>
            <div class="mb-2">
              <h2 class="text-2xl font-bold text-[#0077b6]">Daftar Mitra</h2>
              <p class="text-gray-400 text-sm">Lengkapi data untuk mulai berjualan.</p>
            </div>
            <button @click="step = 'choice'" class="absolute top-8 right-8 text-gray-300 hover:text-gray-500 p-2"><i
                class="fas fa-times text-xl"></i></button>
          </div>

          <div class="flex-1 overflow-y-auto px-8 pb-8 no-scrollbar">
            <form action="{{ route('petshop.register') }}" method="POST" class="space-y-4">
              @csrf
              <div>
                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                  class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 px-4 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                @error('name') <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p> @enderror
              </div>

              <div>
                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Email Bisnis</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                  class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 px-4 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                @error('email') <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p> @enderror
              </div>

              <div>
                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">No. WhatsApp</label>
                <input type="number" name="phone" value="{{ old('phone') }}" required
                  class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 px-4 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                @error('phone') <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p> @enderror
              </div>

              <div>
                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1">Kata Sandi</label>
                <div class="relative">
                  <input :type="showRegPass ? 'text' : 'password'" name="password" required
                    class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 px-4 pr-12 text-base md:text-sm focus:ring-2 focus:ring-blue-400 outline-none">
                  <button type="button" @click="showRegPass = !showRegPass"
                    class="absolute right-4 top-3.5 text-gray-400 hover:text-blue-500">
                    <i class="fas" :class="showRegPass ? 'fa-eye-slash' : 'fa-eye'"></i>
                  </button>
                </div>
                @error('password') <p class="text-[10px] text-red-500 mt-1">{{ $message }}</p> @enderror
              </div>

              <button type="submit"
                class="w-full bg-gradient-to-r from-[#0077b6] to-[#0096c7] text-white font-bold py-4 rounded-xl shadow-lg hover:scale-[1.02] transition-all mb-4">Daftar
                Sekarang</button>
            </form>

            <div class="text-center mt-4">
              <p class="text-xs text-gray-400">Sudah punya akun? <button @click="step = 'login'"
                  class="text-[#0077b6] font-bold hover:underline">Masuk</button></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>