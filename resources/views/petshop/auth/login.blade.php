<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Mitra - PawPaw</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Quicksand', sans-serif; }

        /* 1. ANIMASI BACKGROUND PARTIKEL */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: floatParticle 10s infinite linear;
        }
        @keyframes floatParticle {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }

        /* 2. CUSTOM EASING (AGAR TIDAK KAKU) */
        /* Ini kunci agar animasi terasa "mahal" & elastis */
        .ease-elastic { transition-timing-function: cubic-bezier(0.34, 1.56, 0.64, 1); }
        .ease-out-expo { transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1); }

        /* 3. FLOAT ANIMATION */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .floating-anim { animation: float 6s ease-in-out infinite; }

        /* 4. LOGO POP-IN */
        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; filter: blur(10px); }
            100% { transform: scale(1); opacity: 1; filter: blur(0); }
        }
        .animate-pop { animation: popIn 1s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }

        .bg-pawpaw {
            background: linear-gradient(180deg, #60a5fa 0%, #93c5fd 40%, #bfdbfe 100%);
        }
    </style>
</head>

<body class="h-screen w-full overflow-hidden bg-white"
      x-data="{
          step: 'splash',
          mouseX: 0,
          mouseY: 0,
          init() {
              setTimeout(() => { this.step = 'welcome'; }, 3000);
          }
      }"
      @mousemove="mouseX = $event.clientX; mouseY = $event.clientY">

    <div class="w-full h-full relative flex flex-col md:flex-row">

        <div x-show="step === 'splash'"
             x-transition:leave="transition ease-in-out duration-1000"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-110 blur-xl"
             class="fixed inset-0 z-[100] bg-pawpaw flex flex-col items-center justify-center">

             <div class="particle w-2 h-2 top-[80%] left-[20%]"></div>
             <div class="particle w-3 h-3 top-[90%] left-[60%] delay-1000"></div>
             <div class="particle w-1 h-1 top-[70%] left-[40%] delay-500"></div>

             <div class="animate-pop flex flex-col items-center">
                 <img src="{{ asset('images/logo-pawpaw-white.png') }}" class="w-48 h-48 md:w-64 md:h-64 object-contain drop-shadow-[0_0_30px_rgba(255,255,255,0.6)]">
                 <h1 class="text-5xl md:text-7xl font-bold text-white mt-4 tracking-wider drop-shadow-lg">PawPaw</h1>
                 <p class="text-white text-lg md:text-xl mt-2 font-medium tracking-[0.3em] opacity-80">MITRA DASHBOARD</p>
             </div>
        </div>


        <div class="absolute inset-0 md:relative md:w-7/12 lg:w-2/3 bg-pawpaw overflow-hidden transition-all duration-700">

            <div class="hidden md:block absolute w-[500px] h-[500px] bg-white/10 rounded-full blur-[100px] pointer-events-none transition-transform duration-75 ease-out"
                 :style="`transform: translate(${mouseX - 250}px, ${mouseY - 250}px)`">
            </div>

            <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl transition-transform duration-1000 ease-out"
                 :style="`transform: translate(${mouseX * -0.02}px, ${mouseY * -0.02}px)`"></div>
            <div class="absolute bottom-20 right-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl transition-transform duration-1000 ease-out"
                 :style="`transform: translate(${mouseX * 0.03}px, ${mouseY * 0.03}px)`"></div>

            <div class="absolute inset-0 flex flex-col items-center justify-center p-8 z-10 transition-all duration-700 ease-elastic"
                 :class="step === 'login' ? 'opacity-0 translate-y-[-200px] scale-50 md:opacity-100 md:translate-y-0 md:scale-100' : ''">

                 <div class="floating-anim relative w-64 h-64 md:w-[28rem] md:h-[28rem] lg:w-[32rem] lg:h-[32rem] transition-transform duration-200 ease-out"
                      :style="window.innerWidth > 768 ? `transform: translate(${mouseX * 0.04}px, ${mouseY * 0.04}px)` : ''">
                    <img src="{{ asset('images/kucing-awan.png') }}" class="w-full h-full object-contain drop-shadow-2xl">
                </div>

                <div class="mt-6 md:mt-10 max-w-lg text-center relative transition-transform duration-300"
                     :style="window.innerWidth > 768 ? `transform: translate(${mouseX * 0.01}px, ${mouseY * 0.01}px)` : ''">
                    <h2 class="text-white text-2xl md:text-4xl font-bold leading-tight drop-shadow-lg">
                        Satu Sentuhan,<br>Seribu Goyangan Ekor
                    </h2>
                    <p class="text-blue-50 mt-4 text-sm md:text-lg opacity-90 hidden md:block">
                        Kelola layanan petshop Anda dengan mudah, cepat, dan menyenangkan.
                    </p>
                </div>
            </div>
        </div>


        <div class="absolute inset-0 md:relative md:w-5/12 lg:w-1/3 flex flex-col justify-end md:justify-center items-center z-20 pointer-events-none md:pointer-events-auto md:bg-white/80 md:backdrop-blur-xl">

            <div class="w-full max-w-md px-8 pb-8 md:pb-0 pointer-events-auto md:px-12 relative">

                <div x-show="step === 'welcome'"
                     x-transition:enter="transition ease-out-expo duration-700 delay-300"
                     x-transition:enter-start="opacity-0 translate-y-10 scale-90"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="text-center md:text-left">

                    <div class="hidden md:flex items-center gap-3 mb-8">
                        <img src="{{ asset('images/logo-pawpaw-white.png') }}" class="w-10 h-10 brightness-0 opacity-20">
                        <span class="text-gray-400 font-bold tracking-widest text-sm">PAWPAW ADMIN</span>
                    </div>

                    <h3 class="text-white md:text-gray-800 text-3xl font-bold mb-2 md:mb-4 drop-shadow-md md:drop-shadow-none">
                        Halo, Mitra!
                    </h3>
                    <p class="text-blue-100 md:text-gray-500 mb-8 md:mb-10 text-sm md:text-base drop-shadow md:drop-shadow-none">
                        Siap mengelola pesanan hari ini?
                    </p>

                    <button @click="step = 'choice'"
                            class="w-full bg-white/30 backdrop-blur-md md:bg-[#0077b6] border border-white/50 md:border-transparent text-white font-bold py-4 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-[1.02] md:hover:bg-blue-700 md:hover:text-white transition-all duration-300 ease-elastic text-lg group relative overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            Memulai
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </button>
                </div>


                <div x-show="step === 'choice'"
                     x-transition:enter="transition ease-out-expo duration-500"
                     x-transition:enter-start="opacity-0 translate-y-10"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="flex flex-col gap-4">

                     <div class="hidden md:block mb-8 text-center animate-bounce">
                        <i class="fas fa-paw text-6xl text-blue-200"></i>
                    </div>

                    <button @click="step = 'login'"
                            class="w-full bg-white md:bg-[#0077b6] text-[#60a5fa] md:text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-blue-200/50 hover:scale-[1.02] hover:-translate-y-1 transition-all duration-300 ease-elastic text-lg">
                        Masuk Akun
                    </button>

                    <button class="w-full bg-white/20 md:bg-white md:border-2 md:border-gray-100 backdrop-blur-sm md:backdrop-blur-none border border-white/40 text-white md:text-gray-600 font-bold py-4 rounded-xl hover:bg-white/30 md:hover:bg-gray-50 hover:scale-[1.02] transition-all duration-300 ease-elastic text-lg">
                        Daftar Mitra Baru
                    </button>

                     <button @click="step = 'welcome'" class="text-white md:text-gray-400 text-sm mt-4 font-bold hover:underline drop-shadow-md md:drop-shadow-none text-center opacity-70 hover:opacity-100 transition-opacity">
                        Kembali
                    </button>
                </div>


                <div x-show="step === 'login'"
                     x-transition:enter="transition ease-out-expo duration-700"
                     x-transition:enter-start="opacity-0 translate-y-full md:translate-y-0 md:translate-x-20 scale-90"
                     x-transition:enter-end="opacity-100 translate-y-0 md:translate-x-0 scale-100"
                     class="bg-white rounded-t-[2.5rem] md:rounded-2xl p-8 pb-12 md:p-8 shadow-[0_-10px_40px_rgba(0,0,0,0.1)] md:shadow-none h-[65vh] md:h-auto w-full absolute bottom-0 md:relative left-0 md:left-auto">

                    <div class="w-12 h-1.5 bg-gray-200 rounded-full mx-auto mb-8 md:hidden"></div>

                    <div class="mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-[#0077b6] mb-2">Selamat Datang!</h2>
                        <p class="text-gray-400 text-sm">Silakan masuk dengan akun terdaftar.</p>
                    </div>

                    <form action="{{ route('petshop.login') }}" method="GET">
                        @csrf
                        <div class="space-y-5">
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1 group-focus-within:text-blue-500 transition-colors">Email</label>
                                <div class="relative transform transition-all duration-300 group-focus-within:scale-[1.02]">
                                    <i class="fas fa-envelope absolute left-4 top-3.5 text-blue-300 group-focus-within:text-blue-500 transition-colors"></i>
                                    <input type="email" name="email" placeholder="nama@email.com" class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white text-sm text-gray-700 placeholder-blue-300 transition-all shadow-sm">
                                </div>
                            </div>

                            <div class="group">
                                <label class="block text-xs font-bold text-gray-500 mb-1 ml-1 group-focus-within:text-blue-500 transition-colors">Kata Sandi</label>
                                <div class="relative transform transition-all duration-300 group-focus-within:scale-[1.02]">
                                    <i class="fas fa-lock absolute left-4 top-3.5 text-blue-300 group-focus-within:text-blue-500 transition-colors"></i>
                                    <input type="password" name="password" placeholder="••••••••" class="w-full bg-blue-50/30 border border-blue-100 rounded-xl py-3 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white text-sm text-gray-700 placeholder-blue-300 transition-all shadow-sm">
                                    <button type="button" class="absolute right-4 top-3.5 text-gray-400 hover:text-blue-500 transition-colors">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <a href="#" class="text-xs text-[#0077b6] font-bold hover:text-blue-700 hover:underline transition-all">Lupa Kata Sandi?</a>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-[#0077b6] to-[#0096c7] text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-200 hover:shadow-blue-300/50 hover:scale-[1.02] active:scale-95 transition-all duration-300 ease-elastic">
                                Masuk Sekarang
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-xs text-gray-400">Belum jadi mitra?</p>
                        <button class="text-sm font-bold text-[#0077b6] hover:underline">Daftar disini</button>
                    </div>

                    <button @click="step = 'choice'" class="absolute top-6 right-6 md:top-0 md:right-0 md:relative md:float-right md:-mt-12 text-gray-300 hover:text-gray-500 transition-transform hover:rotate-90">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

            </div>
        </div>

    </div>

</body>
</html>