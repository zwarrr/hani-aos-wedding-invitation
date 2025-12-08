<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wedding Invitation - Hani & Aos</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
    }

    .font-gv {
      font-family: 'Great Vibes', cursive;
    }

    .font-pd {
      font-family: 'Playfair Display', serif;
    }

    .font-pp {
      font-family: 'Poppins', sans-serif;
    }

    /* Animasi fade-in + slide-up */
    .fade-up {
      opacity: 0;
      transform: translateY(20px);
      transition: all 1s ease-out;
    }

    .fade-up.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body class="w-full h-full font-pp">

  <div class="relative w-full h-full bg-stone-100">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
      <img 
        src="/assets/background_awal.png"
        class="absolute inset-0 w-full h-full object-cover"
      />
      <!-- Gradient overlay dari bawah ke atas (putih ke transparan) -->
      <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.7) 40%, rgba(255,255,255,0.3) 60%, rgba(255,255,255,0) 100%);"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 h-full w-full flex flex-col items-center justify-end pb-12 px-6">

      <!-- TEXT CONTENT DI BAWAH -->
      <div class="text-center max-w-sm">
        <!-- THE WEDDING OF -->
        <p class="text-stone-600 text-[10px] font-pp uppercase tracking-[0.2em] mb-3 fade-up">
          The Wedding of
        </p>

        <!-- NAMA MEMPELAI -->
        <h1 class="text-5xl font-gv text-stone-700 mb-6 fade-up leading-tight">
          Hani &amp; Aos
        </h1>

        <!-- KEPADA -->
        <div class="mb-1 fade-up">
          <p class="text-stone-600 text-xs font-pp mb-3">
            Kepada Bapak/Ibu/Saudara/i
          </p>
        </div>

        <!-- TOMBOL BUKA UNDANGAN -->
        <button
          id="openBtn"
          class="text-white px-8 py-2.5 rounded-full shadow-lg hover:opacity-90
                 transition-all font-pp font-normal text-sm fade-up flex items-center gap-2 mx-auto"
          style="background: #c9a882;"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
          </svg>
          Buka Undangan
        </button>
      </div>

    </div>
  </div>

  <script>
    // Animasi fade-up saat halaman dibuka
    window.addEventListener('load', () => {
      document.querySelectorAll('.fade-up').forEach((el, index) => {
        setTimeout(() => {
          el.classList.add('show');
        }, index * 200);
      });
    });

    // Tombol redirect ke main dengan parameter untuk auto-play music
    document.getElementById("openBtn").addEventListener("click", () => {
      window.location.href = "{{ route('main') }}?autoplay=true";
    });
  </script>

</body>
</html>
