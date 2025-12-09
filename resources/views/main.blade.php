<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wedding Invitation - Hani & Aos</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body, html {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .font-gv {
      font-family: 'Great Vibes', cursive;
    }

    .font-pd {
      font-family: 'Playfair Display', serif;
      font-style: normal;
    }

    .font-pp {
      font-family: 'Poppins', sans-serif;
      font-style: normal;
    }

    p {
      font-style: normal !important;
    }

    .text-shadow {
      text-shadow: 0 3px 8px rgba(0,0,0,0.55);
    }

    /* Cover page */
    #cover-page {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      z-index: 9999;
      transition: transform 1s cubic-bezier(0.65, 0, 0.35, 1);
    }

    #cover-page.slide-up {
      transform: translateY(-100%);
    }

    /* Main content */
    #main-content {
      position: relative;
      z-index: 1;
    }

    .section {
      min-height: 100vh;
    }

    /* Animasi fade-in */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.8s ease-out;
    }

    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Background overlay */
    .overlay-gradient {
      background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.1));
    }

    /* Toast Notification Styles */
    .alert-success {
      display: flex;
      padding: 1rem;
      border-radius: 0.5rem;
      position: relative;
      overflow: hidden;
      background-color: #d1f4e0;
      border: 1px solid #48c774;
      color: #0f5132;
    }

    .btn-sm {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border: none;
      background: transparent;
      font-size: 0.875rem;
    }

    .btn-ghost:hover {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .btn-circle {
      border-radius: 9999px;
      width: 2rem;
      height: 2rem;
      padding: 0;
    }

    .bg-success-content {
      background-color: #48c774;
    }

    /* Toast Animations */
    @keyframes bounce-in {
      0% {
        opacity: 0;
        transform: scale(0.3) translateY(-20px);
      }
      50% {
        transform: scale(1.05);
      }
      70% {
        transform: scale(0.9);
      }
      100% {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    @keyframes progress-bar {
      0% {
        width: 100%;
      }
      100% {
        width: 0%;
      }
    }

    .animate-bounce-in {
      animation: bounce-in 0.5s ease-out;
    }

    .animate-progress-bar {
      animation: progress-bar 3s linear;
    }
  </style>
</head>

<body class="font-pp">

  <!-- Background Music -->
  <audio id="bgMusic" loop>
    <source src="{{ asset('assets/sound/Anugerah Terindah - Andmesh (Saxophone Cover by Dori Wirawan).mp3') }}" type="audio/mpeg">
  </audio>

  <!-- Music Control Button -->
  <button id="musicToggle" class="fixed bottom-6 right-6 z-50 bg-white rounded-full w-14 h-14 flex items-center justify-center shadow-xl hover:shadow-2xl transition-all hover:scale-110">
    <i class="fas fa-music text-stone-600 text-xl"></i>
  </button>

  <!-- Copy Success Toast Notification -->
  <div id="copyToast" class="fixed top-4 right-4 z-50 max-w-sm transform translate-x-[450px] transition-all duration-300 opacity-0">
    <div class="alert-success shadow-lg w-full">
      <div class="flex items-center w-full gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="flex-1 min-w-0">
          <h3 class="font-semibold text-sm">
            <span id="toastBankName"></span> <span class="opacity-70">berhasil disalin!</span>
          </h3>
          <div class="text-xs opacity-70 font-mono mt-0.5">
            <span id="toastAccountNumber"></span>
          </div>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 h-1 bg-success-content animate-progress-bar"></div>
    </div>
  </div>

  <!-- Ucapan Success Toast Notification -->
  <div id="ucapanToast" class="fixed top-4 right-4 z-50 max-w-sm transform translate-x-[450px] transition-all duration-300 opacity-0">
    <div class="alert-success shadow-lg w-full">
      <div class="flex items-center w-full gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="flex-1 min-w-0">
          <h3 class="font-semibold text-sm">
            Ucapan berhasil dikirim!
          </h3>
          <div class="text-xs opacity-70 mt-0.5">
            Terima kasih atas doa dan ucapannya 🙏
          </div>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 h-1 bg-success-content animate-progress-bar"></div>
    </div>
  </div>

  <!-- Modal Validasi Form -->
  <div id="validationModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm pointer-events-none" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm mx-4 transform scale-95 transition-all duration-300 pointer-events-auto" id="validationModalContent">
      <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-amber-100 mb-4">
          <i class="fas fa-exclamation-triangle text-2xl text-amber-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-stone-800 mb-2">Peringatan</h3>
        <p class="text-sm text-stone-600 mb-6" id="validationMessage">Nama dan ucapan tidak boleh kosong!</p>
        <button onclick="closeValidationModal()" class="w-full bg-gradient-to-r from-stone-600 to-stone-700 text-white py-3 px-6 rounded-xl hover:from-stone-700 hover:to-stone-800 transition-all duration-300 font-semibold shadow-lg">
          Mengerti
        </button>
      </div>
    </div>
  </div>

  <!-- Modal Error -->
  <div id="errorModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm pointer-events-none" style="display: none;">
    <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm mx-4 transform scale-95 transition-all duration-300 pointer-events-auto" id="errorModalContent">
      <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
          <i class="fas fa-times-circle text-2xl text-red-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-stone-800 mb-2">Gagal Mengirim</h3>
        <p class="text-sm text-stone-600 mb-6" id="errorMessage">Terjadi kesalahan. Silakan coba lagi.</p>
        <button onclick="closeErrorModal()" class="w-full bg-gradient-to-r from-stone-600 to-stone-700 text-white py-3 px-6 rounded-xl hover:from-stone-700 hover:to-stone-800 transition-all duration-300 font-semibold shadow-lg">
          Tutup
        </button>
      </div>
    </div>
  </div>

  <!-- COVER PAGE (dari index.html) -->
  <div id="cover-page">
    @php
      // Load cover content from frontend.index
      $coverContent = file_get_contents(resource_path('views/frontend/index.blade.php'));
      // Extract body content
      preg_match('/<body[^>]*>(.*?)<\/body>/is', $coverContent, $matches);
      $bodyContent = $matches[1] ?? '';
      // Remove script tags from body
      $bodyContent = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $bodyContent);
    @endphp
    {!! $bodyContent !!}
  </div>

  <!-- MAIN CONTENT -->
  <div id="main-content">
    <!-- SECTION 1: COUNTDOWN WEDDING -->
    <div id="countdown">
      @include('frontend.section-countdown')
    </div>

    <!-- SECTION 2: AYAT -->
    <div id="ayat">
      @include('frontend.section-ayat')
    </div>

    <!-- SECTION 3: MEMPELAI -->
    <div id="mempelai">
      @include('frontend.section-mempelai')
    </div>

    <!-- SECTION 4: LOVE STORY -->
    <div id="lovestory">
      @include('frontend.section-lovestory')
    </div>

    <!-- SECTION 5: ACARA -->
    <div id="acara">
      @include('frontend.section-acara')
    </div>

    <!-- SECTION 6: AMPLOP DIGITAL -->
    <div id="amplop">
      @include('frontend.section-amplop')
    </div>

    <!-- SECTION 7: UCAPAN -->
    <div id="ucapan">
      @include('frontend.section-ucapan')
    </div>

    <!-- SECTION 8: FOOTER -->
    <div id="footer">
      @include('frontend.section-footer')
    </div>
  </div>

  <script>
    // ===========================================
    // UCAPAN API CONFIGURATION & FUNCTIONS
    // ===========================================
    // API URL - Menggunakan URL relatif untuk menghindari mixed content
    window.API_URL = '/api/ucapan';
    
    window.currentPage = 1;
    window.itemsPerPage = 100;
    window.autoRefreshInterval = null;
    window.serverTime = null; // Simpan waktu server

    // Function untuk format waktu relative menggunakan waktu server
    function getRelativeTime(dateString, serverTimeString) {
      // Parse waktu dari database dan server
      const parseParts = (str) => {
        const parts = str.split(/[- :]/);
        return new Date(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5]);
      };
      
      const past = parseParts(dateString);
      const now = parseParts(serverTimeString);
      
      const diffMs = now - past;
      const diffSec = Math.floor(diffMs / 1000);
      const diffMin = Math.floor(diffSec / 60);
      const diffHour = Math.floor(diffMin / 60);
      const diffDay = Math.floor(diffHour / 24);
      const diffMonth = Math.floor(diffDay / 30);
      const diffYear = Math.floor(diffDay / 365);

      if (diffSec < 0) {
        return 'Baru saja';
      } else if (diffSec < 60) {
        return 'Baru saja';
      } else if (diffMin < 60) {
        return diffMin + ' menit yang lalu';
      } else if (diffHour < 24) {
        return diffHour + ' jam yang lalu';
      } else if (diffDay < 30) {
        return diffDay + ' hari yang lalu';
      } else if (diffMonth < 12) {
        return diffMonth + ' bulan yang lalu';
      } else {
        return diffYear + ' tahun yang lalu';
      }
    }

    // Function untuk submit ucapan - GLOBAL FUNCTION
    window.submitUcapanForm = async function() {
      const namaInput = document.getElementById('nama-input');
      const pesanInput = document.getElementById('pesan-input');
      const kehadiranInput = document.getElementById('kehadiran-input');
      const submitBtn = document.getElementById('submit-ucapan-btn');

      // Validasi form
      if (!namaInput.value.trim() || !pesanInput.value.trim()) {
        showValidationModal('Nama dan ucapan tidak boleh kosong!');
        return false;
      }

      try {
        // Disable button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';

        const response = await fetch('/api/ucapan', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            nama: namaInput.value.trim(),
            pesan: pesanInput.value.trim(),
            kehadiran: kehadiranInput.value
          })
        });

        const data = await response.json();

        if (data.success) {
          // Reset form
          namaInput.value = '';
          pesanInput.value = '';
          kehadiranInput.value = 'hadir';

          // Show success toast
          showUcapanToast();

          // Reload ucapan
          window.loadUcapanFromDB(1);
        } else {
          showErrorModal('Gagal mengirim ucapan: ' + (data.message || 'Unknown error'));
        }
      } catch (error) {
        console.error('Error submitting ucapan:', error);
        showErrorModal('Gagal mengirim ucapan. Silakan coba lagi.');
      } finally {
        // Enable button
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Kirim Ucapan';
      }

      return false;
    }

    // Load ucapan dari database
    window.loadUcapanFromDB = async function(page = 1) {
      console.log('loadUcapanFromDB called with page:', page);
      try {
        const loading = document.getElementById('loading-ucapan');
        const container = document.getElementById('ucapan-container');
        const pagination = document.getElementById('pagination-controls');
        
        console.log('Elements:', { loading, container, pagination });
        
        if (loading) loading.classList.remove('hidden');
        if (container) container.classList.add('hidden');
        if (pagination) pagination.classList.add('hidden');

        const fetchUrl = `${window.API_URL}?page=${page}&limit=${window.itemsPerPage}&t=${Date.now()}`;
        console.log('Fetching from:', fetchUrl);
        
        const response = await fetch(fetchUrl);
        const data = await response.json();
        
        console.log('Data received:', data);

        if (data.success) {
          if (loading) loading.classList.add('hidden');
          
          // Simpan waktu server
          window.serverTime = data.server_time;
          console.log('Server time:', window.serverTime);
          
          if (data.data.length === 0 && page === 1) {
            console.log('No data, showing empty state');
            if (container) {
              container.innerHTML = `
                <div class="text-center py-8">
                  <i class="fas fa-comments text-4xl text-stone-300 mb-3"></i>
                  <p class="text-stone-500">Jadilah yang pertama!</p>
                </div>
              `;
              container.classList.remove('hidden');
            }
          } else {
            console.log('Rendering', data.data.length, 'ucapan...');
            
            // Render ucapan
            const html = data.data.map(ucapan => {
              const kehadiranBadge = {
                'hadir': '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-check-circle mr-1"></i>Hadir</span>',
                'tidak_hadir': '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-times-circle mr-1"></i>Tidak Hadir</span>',
                'masih_ragu': '<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-question-circle mr-1"></i>Masih Ragu</span>'
              };

              // LANGSUNG PAKAI WAKTU DARI DATABASE - TIDAK PERLU RELATIVE TIME
              const waktuLengkap = ucapan.waktu; // Langsung dari DB: "08/12/2025 15:24"

              return `
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                  <div class="flex items-start gap-4">
                    <div class="bg-gradient-to-br from-stone-500 to-stone-700 text-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-md">
                      <i class="fas fa-user"></i>
                    </div>
                    <div class="flex-1">
                      <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-stone-800 text-lg">${ucapan.nama}</h4>
                        ${kehadiranBadge[ucapan.kehadiran] || ''}
                      </div>
                      <p class="text-stone-600 mt-2 leading-relaxed">${ucapan.pesan}</p>
                      <p class="text-xs text-stone-400 mt-3"><i class="far fa-clock mr-1"></i>${waktuLengkap}</p>
                    </div>
                  </div>
                </div>
              `;
            }).join('');
            
            if (container) {
              container.innerHTML = html;
              container.classList.remove('hidden');
              console.log('HTML rendered successfully');
            }
            
            // Update pagination - hanya tampilkan jika data lebih dari 3
            if (pagination && data.pagination) {
              window.currentPage = data.pagination.page;
              
              // Hanya tampilkan pagination jika total data lebih dari 3
              if (data.pagination.total > 3) {
                const pageInfo = document.getElementById('page-info');
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                
                if (pageInfo) pageInfo.textContent = `Halaman ${data.pagination.page} dari ${data.pagination.totalPages}`;
                if (prevBtn) prevBtn.disabled = data.pagination.page === 1;
                if (nextBtn) nextBtn.disabled = data.pagination.page === data.pagination.totalPages;
                
                pagination.classList.remove('hidden');
              } else {
                // Sembunyikan pagination jika data 3 atau kurang
                pagination.classList.add('hidden');
              }
            }
          }
        }
      } catch (error) {
        console.error('Error loading ucapan:', error);
        const loading = document.getElementById('loading-ucapan');
        const container = document.getElementById('ucapan-container');
        if (loading) loading.classList.add('hidden');
        if (container) {
          container.innerHTML = `
            <div class="text-center py-8">
              <i class="fas fa-comments text-4xl text-stone-300 mb-3"></i>
              <p class="text-stone-500">Jadilah yang pertama!</p>
            </div>
          `;
          container.classList.remove('hidden');
        }
      }
    }

    // ===========================================
    // PAGE LOADING FUNCTIONS
    // ===========================================
    // Initialize cover page (content already loaded via Blade)
    function loadCoverPage() {
      // Trigger animasi fade-in untuk cover page
      setTimeout(() => {
        document.querySelectorAll('#cover-page .fade-up').forEach((el, index) => {
          setTimeout(() => {
            el.classList.add('show');
          }, index * 300);
        });
      }, 100);
      
      // Setup tombol buka undangan
      setTimeout(() => {
        const btn = document.getElementById('openBtn');
        if (btn) {
          btn.addEventListener('click', openInvitation);
        }
      }, 200);
    }

    // Fungsi buka undangan dengan animasi slide up
    function openInvitation() {
      const coverPage = document.getElementById('cover-page');
      coverPage.classList.add('slide-up');
      
      // Play music saat undangan dibuka
      const bgMusic = document.getElementById('bgMusic');
      bgMusic.play().catch(err => console.log('Auto-play prevented:', err));
      
      // Load semua section setelah animasi dimulai
      setTimeout(() => {
        loadAllSections();
      }, 200);
      
      // Hapus cover page dari DOM setelah animasi selesai
      setTimeout(() => {
        coverPage.style.display = 'none';
      }, 1000);
    }

    // Load semua section - sections sudah di-include di Blade, jadi hanya perlu initialize animations
    function loadAllSections() {
      // Initialize fade-in animations untuk semua section
      setTimeout(() => {
        document.querySelectorAll('.fade-in').forEach(el => {
          observerFadeIn.observe(el);
        });

        // Initialize ucapan section - hanya sekali
        console.log('Initializing ucapan section...');
        window.loadUcapanFromDB(1).then(() => {
          // Setup auto-refresh setelah initial load berhasil
          if (window.autoRefreshInterval) {
            clearInterval(window.autoRefreshInterval);
          }
          window.autoRefreshInterval = setInterval(() => {
            if (window.currentPage) {
              window.loadUcapanFromDB(window.currentPage);
            }
          }, 30000); // Auto refresh setiap 30 detik
        });
      }, 100);
    }

    // Intersection Observer untuk animasi fade-in
    const observerFadeIn = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    // Load cover page saat halaman dibuka
    loadCoverPage();

    // Auto-play music jika dari index.html
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('autoplay') === 'true') {
      setTimeout(() => {
        const bgMusic = document.getElementById('bgMusic');
        bgMusic.play().catch(err => console.log('Auto-play prevented:', err));
      }, 500);
    }

    // Music Control
    const bgMusic = document.getElementById('bgMusic');
    const musicToggle = document.getElementById('musicToggle');
    let isPlaying = false;

    musicToggle.addEventListener('click', () => {
      if (isPlaying) {
        bgMusic.pause();
        musicToggle.innerHTML = '<i class="fas fa-music text-stone-400 text-xl"></i>';
      } else {
        bgMusic.play();
        musicToggle.innerHTML = '<i class="fas fa-music text-stone-600 text-xl"></i>';
      }
      isPlaying = !isPlaying;
    });

    // Update button state when music plays
    bgMusic.addEventListener('play', () => {
      isPlaying = true;
      musicToggle.innerHTML = '<i class="fas fa-music text-stone-600 text-xl"></i>';
    });

    bgMusic.addEventListener('pause', () => {
      isPlaying = false;
      musicToggle.innerHTML = '<i class="fas fa-music text-stone-400 text-xl"></i>';
    });

    // Countdown Timer
    const weddingDate = new Date('2026-01-18T08:00:00').getTime();

    function updateCountdown() {
      const now = new Date().getTime();
      const distance = weddingDate - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Update countdown di section acara
      const daysEl = document.getElementById('days');
      const hoursEl = document.getElementById('hours');
      const minutesEl = document.getElementById('minutes');
      const secondsEl = document.getElementById('seconds');

      if (daysEl) daysEl.textContent = days.toString().padStart(2, '0');
      if (hoursEl) hoursEl.textContent = hours.toString().padStart(2, '0');
      if (minutesEl) minutesEl.textContent = minutes.toString().padStart(2, '0');
      if (secondsEl) secondsEl.textContent = seconds.toString().padStart(2, '0');

      // Update countdown di section countdown
      const daysMainEl = document.getElementById('days-main');
      const hoursMainEl = document.getElementById('hours-main');
      const minutesMainEl = document.getElementById('minutes-main');
      const secondsMainEl = document.getElementById('seconds-main');

      if (daysMainEl) daysMainEl.textContent = days.toString().padStart(2, '0');
      if (hoursMainEl) hoursMainEl.textContent = hours.toString().padStart(2, '0');
      if (minutesMainEl) minutesMainEl.textContent = minutes.toString().padStart(2, '0');
      if (secondsMainEl) secondsMainEl.textContent = seconds.toString().padStart(2, '0');
    }

    setInterval(updateCountdown, 1000);

    // Copy to Clipboard Function
    function copyToClipboard(text, bankName) {
      // Create a temporary input element (use input instead of textarea to avoid keyboard)
      const tempInput = document.createElement('input');
      tempInput.value = text;
      tempInput.style.position = 'absolute';
      tempInput.style.left = '-9999px';
      tempInput.setAttribute('readonly', '');
      document.body.appendChild(tempInput);
      
      // Select and copy
      tempInput.select();
      tempInput.setSelectionRange(0, 99999); // For mobile devices
      
      try {
        const successful = document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        if (successful) {
          showToast(text, bankName);
        } else {
          // Try modern clipboard API
          if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(() => {
              showToast(text, bankName);
            }).catch(err => {
              console.error('Gagal menyalin:', err);
            });
          }
        }
      } catch (err) {
        document.body.removeChild(tempInput);
        console.error('Error:', err);
      }
    }

    // Show Toast Notification
    function showToast(accountNumber, bankName) {
      const toast = document.getElementById('copyToast');
      const toastBankName = document.getElementById('toastBankName');
      const toastAccountNumber = document.getElementById('toastAccountNumber');
      
      toastBankName.textContent = bankName;
      toastAccountNumber.textContent = accountNumber;
      
      // Add bounce-in animation
      const alertBox = toast.querySelector('.alert-success');
      alertBox.classList.add('animate-bounce-in');
      
      // Slide in with opacity
      toast.style.transform = 'translateX(0)';
      toast.style.opacity = '1';
      
      // Auto hide after 3 seconds
      setTimeout(() => {
        toast.style.transform = 'translateX(450px)';
        toast.style.opacity = '0';
      }, 3000);
    }

    // Show Ucapan Toast Notification
    function showUcapanToast() {
      const toast = document.getElementById('ucapanToast');
      
      // Add bounce-in animation
      const alertBox = toast.querySelector('.alert-success');
      alertBox.classList.add('animate-bounce-in');
      
      // Slide in with opacity
      toast.style.transform = 'translateX(0)';
      toast.style.opacity = '1';
      
      // Auto hide after 3 seconds
      setTimeout(() => {
        toast.style.transform = 'translateX(450px)';
        toast.style.opacity = '0';
        alertBox.classList.remove('animate-bounce-in');
      }, 3000);
    }

    // Show Validation Modal
    function showValidationModal(message) {
      const modal = document.getElementById('validationModal');
      const modalContent = document.getElementById('validationModalContent');
      const messageEl = document.getElementById('validationMessage');
      
      messageEl.textContent = message;
      modal.style.display = 'flex';
      modal.classList.remove('hidden', 'pointer-events-none');
      modal.classList.add('pointer-events-auto');
      
      setTimeout(() => {
        modalContent.style.transform = 'scale(1)';
      }, 10);
    }

    // Close Validation Modal
    function closeValidationModal() {
      const modal = document.getElementById('validationModal');
      const modalContent = document.getElementById('validationModalContent');
      
      modalContent.style.transform = 'scale(0.95)';
      
      setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        modal.classList.remove('pointer-events-auto');
        modal.style.display = 'none';
      }, 200);
    }

    // Show Error Modal
    function showErrorModal(message) {
      const modal = document.getElementById('errorModal');
      const modalContent = document.getElementById('errorModalContent');
      const messageEl = document.getElementById('errorMessage');
      
      messageEl.textContent = message;
      modal.style.display = 'flex';
      modal.classList.remove('hidden', 'pointer-events-none');
      modal.classList.add('pointer-events-auto');
      
      setTimeout(() => {
        modalContent.style.transform = 'scale(1)';
      }, 10);
    }

    // Close Error Modal
    function closeErrorModal() {
      const modal = document.getElementById('errorModal');
      const modalContent = document.getElementById('errorModalContent');
      
      modalContent.style.transform = 'scale(0.95)';
      
      setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        modal.classList.remove('pointer-events-auto');
        modal.style.display = 'none';
      }, 200);
    }

    // Add to Calendar Function
    window.addToCalendar = function() {
      // Redirect ke route Laravel yang generate .ics
      window.location.href = '/save-the-date';
      
      // Show toast notification
      setTimeout(() => {
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 z-50 max-w-sm';
        toast.style.animation = 'slideInRight 0.3s ease-out';
        toast.innerHTML = `
          <div class="bg-white shadow-2xl rounded-2xl p-4 border-2 border-green-200">
            <div class="flex items-center gap-3">
              <div class="bg-green-100 rounded-full p-2">
                <i class="fas fa-calendar-check text-green-600 text-xl"></i>
              </div>
              <div>
                <h3 class="font-semibold text-stone-800">Berhasil!</h3>
                <p class="text-sm text-stone-600">Kalender sedang dibuka...</p>
              </div>
            </div>
          </div>
        `;
        document.body.appendChild(toast);
        setTimeout(() => {
          toast.style.animation = 'slideOutRight 0.3s ease-in';
          setTimeout(() => toast.remove(), 300);
        }, 3000);
      }, 100);
    }
  </script>

</body>
</html>