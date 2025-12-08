<!-- SECTION: COUNTDOWN WEDDING -->
<section class="section relative overflow-hidden" style="min-height: 100vh;">
  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="/assets/background.png" alt="Background" class="w-full h-full object-cover">
  </div>
  
  <!-- Gradient overlay dari bawah ke atas (putih ke transparan) -->
  <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.7) 40%, rgba(255,255,255,0.3) 60%, rgba(255,255,255,0) 100%);"></div>

  <!-- CONTENT -->
  <div class="relative z-10 h-full w-full flex flex-col items-center justify-center px-6" style="min-height: 100vh;">
    
    <!-- Header -->
    <div class="text-center mb-4 fade-in mt-12">
      <p class="text-stone-600 text-[10px] font-pp uppercase tracking-[0.2em]">
        The Wedding of
      </p>
    </div>

    <!-- Foto Couple -->
    <div class="relative mb-4 fade-in">
      <img src="/assets/frame_couple.png" alt="Couple Photo" class="w-72 h-auto">
    </div>

    <!-- Nama Couple -->
    <div class="text-center mb-4 fade-in">
      <h1 class="text-5xl font-gv text-stone-700 mb-2 leading-tight">
        Hani &amp; Aos
      </h1>
      <p class="text-stone-600 text-sm font-pp">
        We invite you to celebrate our wedding
      </p>
    </div>

    <!-- Tanggal -->
    <div class="text-center mb-4 fade-in">
      <p class="text-stone-700 text-sm font-pp font-medium">
        Minggu, 18 Januari 2026
      </p>
    </div>

    <!-- Save The Date Button -->
    <div class="fade-in mb-6">
      <button onclick="addToCalendar()" class="text-white px-8 py-2.5 rounded-full shadow-lg hover:opacity-90 transition-all font-pp font-normal text-sm hover:scale-105" style="background: #c9a882;">
        <i class="far fa-calendar-plus mr-2"></i>Save The Date
      </button>
    </div>

  </div>
</section>
