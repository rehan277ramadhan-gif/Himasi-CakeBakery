<?php 
include 'header.php';
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap');

  :root {
    --rose:       #c9848a;
    --rose-light: #e8b4b8;
    --rose-dark:  #a05a62;
    --gold:       #c9a96e;
    --gold-light: #e8d5b0;
    --cream:      #fdf6f0;
    --white:      #ffffff;
    --text-dark:  #3b2a2c;
    --text-mid:   #7a5c60;
    --text-soft:  #b0888c;
  }

  .manual-section {
    padding: 60px 0 120px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  /* HEADER */
  .manual-header { margin-bottom: 50px; }
  .manual-header h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 600;
    color: var(--text-dark);
    letter-spacing: 0.02em;
    margin-bottom: 6px;
  }
  .header-line { display:flex; align-items:center; gap:12px; margin-top:8px; margin-bottom:8px; }
  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }
  .manual-header .sub {
    font-size: 0.75rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--text-soft);
    font-weight: 300;
  }

  /* ACCORDION CUSTOM */
  .accordion-wrap {
    max-width: 780px;
    animation: fadeUp .7s ease both;
  }

  .acc-item {
    background: var(--white);
    border: 1px solid rgba(201,132,138,0.15);
    border-radius: 6px;
    margin-bottom: 14px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(160,90,98,0.07);
    transition: box-shadow .3s;
  }

  .acc-item:hover {
    box-shadow: 0 8px 28px rgba(160,90,98,0.12);
  }

  .acc-toggle {
    display: block;
    width: 100%;
    padding: 20px 28px;
    text-decoration: none;
    background: var(--white);
    border: none;
    text-align: left;
    cursor: pointer;
  }

  .acc-toggle:hover, .acc-toggle:focus {
    text-decoration: none;
    background: rgba(201,132,138,0.04);
  }

  .acc-toggle-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  .acc-toggle-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .acc-icon {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--rose-light), var(--rose));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
  }

  .acc-title {
    font-family: 'Jost', sans-serif;
    font-size: 0.92rem;
    font-weight: 500;
    color: var(--text-dark);
    letter-spacing: 0.02em;
    margin: 0;
  }

  .acc-caret {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 1px solid var(--rose-light);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--rose);
    font-size: 0.7rem;
    flex-shrink: 0;
    transition: transform .3s, background .25s;
  }

  .acc-item.open .acc-caret {
    transform: rotate(180deg);
    background: var(--rose);
    color: var(--white);
    border-color: var(--rose);
  }

  .acc-body {
    display: none;
    padding: 0 28px 24px 28px;
    border-top: 1px solid rgba(201,132,138,0.1);
  }

  .acc-item.open .acc-body { display: block; }

  .acc-body ol {
    margin: 18px 0 0 0;
    padding-left: 0;
    list-style: none;
    counter-reset: steps;
  }

  .acc-body ol li {
    counter-increment: steps;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(201,132,138,0.08);
    font-size: 0.88rem;
    color: var(--text-mid);
    line-height: 1.6;
  }

  .acc-body ol li:last-child { border-bottom: none; }

  .acc-body ol li::before {
    content: counter(steps);
    min-width: 28px;
    height: 28px;
    background: linear-gradient(135deg, var(--rose), var(--rose-dark));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 600;
    flex-shrink: 0;
  }

  @keyframes fadeUp {
    from { opacity:0; transform:translateY(20px); }
    to   { opacity:1; transform:translateY(0); }
  }
</style>

<div class="manual-section">
  <div class="container">

    <!-- HEADER -->
    <div class="manual-header">
      <h2>Manual Aplikasi</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Panduan penggunaan aplikasi HIMASI-CAKE BAKERY</p>
    </div>

    <!-- ACCORDION -->
    <div class="accordion-wrap">

      <!-- Item 1 — sudah open by default seperti aslinya -->
      <div class="acc-item open" id="accordion">
        <a class="acc-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
           onclick="toggleAcc(this); return false;">
          <div class="acc-toggle-inner">
            <div class="acc-toggle-left">
              <div class="acc-icon">🛒</div>
              <h4 class="acc-title">Bagaimana Cara Berbelanja di Himasi Cake &amp; Bakery?</h4>
            </div>
            <div class="acc-caret">▼</div>
          </div>
        </a>
        <div id="collapseOne" class="acc-body panel-collapse collapse in">
          <ol>
            <li>Pastikan Anda sudah Daftar/Register dahulu</li>
            <li>Pilih Produk yang ingin dibeli</li>
            <li>Lakukan Checkout pesanan anda</li>
          </ol>
        </div>
      </div>

    </div><!-- /accordion-wrap -->
  </div>
</div>

<script>
function toggleAcc(el) {
  var item = el.closest('.acc-item');
  item.classList.toggle('open');
}
</script>

<?php 
include 'footer.php';
?>