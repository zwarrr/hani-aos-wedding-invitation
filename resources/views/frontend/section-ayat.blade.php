<style>
/* Fade-in untuk teks */
@keyframes fadeInSmooth {
  0% { opacity: 0; transform: translateY(20px); }
  100% { opacity: 1; transform: translateY(0); }
}

.fade-in-smooth {
  animation: fadeInSmooth 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

/* Fade-in + Rotasi untuk ornamen */
@keyframes fadeInRotate {
  0% { opacity: 0; transform: translateY(20px) rotate(-8deg); }
  100% { opacity: 0.7; transform: translateY(0) rotate(-8deg); }
}

@keyframes smoothRotate {
  0%   { transform: rotate(-8deg); }
  50%  { transform: rotate(8deg); }
  100% { transform: rotate(-8deg); }
}

.fade-in-rotate {
  animation: fadeInRotate 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards,
             smoothRotate 8s cubic-bezier(0.45, 0.05, 0.55, 0.95) 1.5s infinite;
}

/* Optional styling */
body {
  margin: 0;
  font-family: sans-serif;
}
.font-pp { font-style: italic; }
.font-pd { font-weight: 600; }
</style>

<!-- SECTION: AYAT -->
<section class="relative w-full overflow-hidden" style="background: #b89968;">
  <div class="relative z-10 w-full flex flex-col items-center justify-center px-6 py-6">
    
    <!-- Ornamen Atas -->
    <div class="mb-3">
      <img src="/assets/ornamen.png"
           alt="Ornament"
           class="w-20 h-auto mx-auto fade-in-rotate">
    </div>

    <!-- Ayat QS Ar-Rum 21 -->
    <div class="max-w-xl mx-auto text-center fade-in-smooth">
      <p class="text-white text-xs leading-relaxed mb-3 font-pp px-4">
        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir."
      </p>
      <p class="text-white text-xs font-pd tracking-wide">
        ( QS. Ar-Rum : 21 )
      </p>
    </div>

  </div>
</section>
