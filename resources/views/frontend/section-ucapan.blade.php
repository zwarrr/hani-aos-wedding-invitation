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
        <span id="page-info" class="text-stone-600 text-sm"></span>
        <button id="next-btn" class="flex items-center gap-2 bg-white text-stone-600 px-8 py-3 rounded-full hover:bg-stone-100 transition-all shadow-lg disabled:opacity-40 disabled:cursor-not-allowed text-sm border border-stone-200">
          <span>Next</span>
          <i class="fas fa-chevron-right text-xs"></i>
        </button>
      </div>
    </div>
    
  </div>
</section>
