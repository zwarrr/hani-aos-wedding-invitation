<!-- SECTION: UCAPAN & DOA -->
<section class="section relative py-20 pb-4" style="background-image: url('/assets/watercolors_bg.png'); background-size: cover; background-position: center;">
  
  <div class="container mx-auto px-6 py-12 max-w-2xl relative z-10">
    
    <!-- Title -->
    <div class="text-center mb-12 fade-in">
      <h2 class="text-5xl font-gv text-stone-700 mb-4">Ucapan & Doa</h2>
      <p class="text-stone-600 text-sm">Berikan ucapan dan doa untuk kedua mempelai</p>
    </div>
    
    <!-- Form Ucapan -->
    <div class="bg-white rounded-3xl shadow-2xl p-8 mb-10 fade-in border border-stone-200">
      <div id="ucapan-form-container">
        <div class="mb-6">
          <label class="block text-stone-700 font-semibold mb-2 text-sm">Nama</label>
          <input type="text" id="nama-input" required class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:outline-none focus:border-stone-500 transition text-sm" placeholder="Nama Anda">
        </div>
        <div class="mb-6">
          <label class="block text-stone-700 font-semibold mb-2 text-sm">Ucapan & Doa</label>
          <textarea rows="4" id="pesan-input" required class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:outline-none focus:border-stone-500 transition resize-none text-sm" placeholder="Tulis ucapan dan doa Anda..."></textarea>
        </div>
        <div class="mb-6">
          <label class="block text-stone-700 font-semibold mb-2 text-sm">Konfirmasi Kehadiran</label>
          <select id="kehadiran-input" required class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:outline-none focus:border-stone-500 transition text-sm">
            <option value="hadir">Hadir</option>
            <option value="tidak_hadir">Tidak Hadir</option>
            <option value="masih_ragu">Masih Ragu</option>
          </select>
        </div>
        <button type="button" id="submit-ucapan-btn" onclick="return submitUcapanForm();" class="w-full bg-stone-600 hover:bg-stone-700 text-white py-3 rounded-xl transition font-semibold shadow-lg text-sm">
          <i class="fas fa-paper-plane mr-2"></i>Kirim Ucapan
        </button>
      </div>
    </div>

    <!-- Daftar Ucapan -->
    <div class="fade-in">
      <h3 class="text-3xl font-gv text-stone-700 mb-8 text-center">Ucapan dari Tamu</h3>
      
      <!-- Loading Indicator -->
      <div id="loading-ucapan" class="text-center py-8 hidden">
        <i class="fas fa-spinner fa-spin text-3xl text-stone-400"></i>
        <p class="text-stone-500 mt-3">Memuat ucapan...</p>
      </div>

      <!-- Container untuk ucapan -->
      <div id="ucapan-container" class="space-y-4 mb-8">
        <!-- Ucapan akan dimuat di sini oleh JavaScript -->
      </div>

      <!-- Pagination Controls -->
      <div id="pagination-controls" class="flex items-center justify-center gap-6 mt-8 hidden">
        <button id="prev-btn" class="flex items-center gap-2 bg-white text-stone-600 px-8 py-3 rounded-full hover:bg-stone-100 transition-all shadow-lg disabled:opacity-40 disabled:cursor-not-allowed text-sm border border-stone-200">
          <i class="fas fa-chevron-left text-xs"></i>
          <span>Prev</span>
        </button>
        <button id="next-btn" class="flex items-center gap-2 bg-white text-stone-600 px-8 py-3 rounded-full hover:bg-stone-100 transition-all shadow-lg disabled:opacity-40 disabled:cursor-not-allowed text-sm border border-stone-200">
          <span>Next</span>
          <i class="fas fa-chevron-right text-xs"></i>
        </button>
      </div>
    </div>
    
  </div>
</section>

<script>
// Ambil config dari main view
const API_URL = '{{ route("api.ucapan.index") }}'.replace('?', '');
const itemsPerPage = window.itemsPerPage || 100; // Ubah dari 3 ke 100

// Load ucapan dari API (function ini dipanggil dari main.html juga)
window.loadUcapanFromDB = async function(page = 1) {
  console.log('loadUcapanFromDB called with page:', page);
  try {
    const loading = document.getElementById('loading-ucapan');
    const container = document.getElementById('ucapan-container');
    const pagination = document.getElementById('pagination-controls');
    
    console.log('Elements found:', { loading, container, pagination });
    
    // Show loading only when actively fetching
    if (loading) loading.classList.remove('hidden');
    if (container) container.classList.add('hidden');
    if (pagination) pagination.classList.add('hidden');

    const fetchUrl = `${API_URL}?page=${page}&limit=${itemsPerPage}&t=${Date.now()}`;
    console.log('Fetching from:', fetchUrl);
    
    const response = await fetch(fetchUrl);
    const data = await response.json();
    
    console.log('Data received:', data);

    if (data.success) {
      if (loading) loading.classList.add('hidden');
      
      if (data.data.length === 0 && page === 1) {
        // No data, show empty state
        console.log('No data found, showing empty state');
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
        renderUcapanFromDB(data.data);
        updatePaginationFromDB(data.pagination);
        if (container) container.classList.remove('hidden');
        if (pagination) pagination.classList.remove('hidden');
      }
    } else {
      throw new Error(data.message);
    }
  } catch (error) {
    console.error('Error loading ucapan:', error);
    const loading = document.getElementById('loading-ucapan');
    const container = document.getElementById('ucapan-container');
    if (loading) loading.classList.add('hidden');
    if (container) {
      container.innerHTML = `
        <div class="text-center py-8">
          <i class="fas fa-exclamation-circle text-3xl text-red-400"></i>
          <p class="text-red-500 mt-3">Gagal memuat ucapan. Silakan refresh halaman.</p>
        </div>
      `;
      container.classList.remove('hidden');
    }
  }
}

// Render ucapan ke dalam container
function renderUcapanFromDB(ucapanList) {
  console.log('renderUcapanFromDB called with:', ucapanList);
  const container = document.getElementById('ucapan-container');
  console.log('Container element:', container);
  
  if (!container) {
    console.error('ucapan-container not found!');
    return;
  }
  
  if (ucapanList.length === 0) {
    console.log('No ucapan to render');
    container.innerHTML = `
      <div class="text-center py-8">
        <i class="fas fa-comments text-4xl text-stone-300 mb-3"></i>
        <p class="text-stone-500">Jadilah yang pertama!</p>
      </div>
    `;
    return;
  }

  console.log('Rendering', ucapanList.length, 'ucapan(s)');
  const html = ucapanList.map(ucapan => {
    const kehadiranBadge = {
      'hadir': '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-check-circle mr-1"></i>Hadir</span>',
      'tidak_hadir': '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-times-circle mr-1"></i>Tidak Hadir</span>',
      'masih_ragu': '<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold"><i class="fas fa-question-circle mr-1"></i>Masih Ragu</span>'
    };

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
            <p class="text-xs text-stone-400 mt-3"><i class="far fa-clock mr-1"></i>${ucapan.waktu_relatif}</p>
          </div>
        </div>
      </div>
    `;
  }).join('');
  
  container.innerHTML = html;
  console.log('HTML rendered to container');
}

// Update pagination controls
function updatePaginationFromDB(pagination) {
  window.currentPage = pagination.page;
  
  const pageInfo = document.getElementById('page-info');
  const prevBtn = document.getElementById('prev-btn');
  const nextBtn = document.getElementById('next-btn');

  if (pageInfo) pageInfo.textContent = `Halaman ${pagination.page} dari ${pagination.total_pages}`;
  if (prevBtn) prevBtn.disabled = pagination.page === 1;
  if (nextBtn) nextBtn.disabled = pagination.page === pagination.totalPages;
}

// Pagination buttons
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

if (prevBtn) {
  prevBtn.addEventListener('click', () => {
    if (window.currentPage > 1) {
      window.loadUcapanFromDB(window.currentPage - 1);
    }
  });
}

if (nextBtn) {
  nextBtn.addEventListener('click', () => {
    window.loadUcapanFromDB(window.currentPage + 1);
  });
}

// Initial load when section is loaded
console.log('Section ucapan script loaded');

// Don't auto-load here, let main.blade.php handle it to avoid duplicate calls
// The main.blade.php will call loadUcapanFromDB(1) when initializing all sections

// Stop auto refresh when page is hidden
document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    if (window.autoRefreshInterval) {
      clearInterval(window.autoRefreshInterval);
    }
  } else {
    if (window.autoRefreshInterval) {
      clearInterval(window.autoRefreshInterval);
    }
    window.autoRefreshInterval = setInterval(() => {
      if (window.currentPage) {
        window.loadUcapanFromDB(window.currentPage);
      }
    }, 30000); // Refresh setiap 30 detik (lebih jarang)
  }
});
</script>
