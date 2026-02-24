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

  .about-section {
    padding: 60px 0 120px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  /* HEADER */
  .about-header {
    margin-bottom: 50px;
  }

  .about-header h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 600;
    color: var(--text-dark);
    letter-spacing: 0.02em;
    margin-bottom: 6px;
  }

  .header-line {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 8px;
    margin-bottom: 8px;
  }

  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }

  .about-header .sub {
    font-size: 0.75rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--text-soft);
    font-weight: 300;
  }

  /* QUOTE BANNER */
  .quote-banner {
    position: relative;
    background: linear-gradient(135deg, #f5d5d8 0%, #e8b4b8 50%, #c9848a 100%);
    border-radius: 6px;
    padding: 40px 48px;
    margin-bottom: 50px;
    overflow: hidden;
    animation: fadeUp .7s ease both;
  }

  .quote-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 70% at 90% 10%, rgba(201,169,110,0.25) 0%, transparent 70%);
    pointer-events: none;
  }

  .deco-circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.2);
    pointer-events: none;
  }
  .deco-circle:nth-child(1) { width:180px; height:180px; top:-50px; right:-40px; }
  .deco-circle:nth-child(2) { width:100px; height:100px; bottom:-20px; left:20px; border-color:rgba(201,169,110,0.3); }

  .quote-banner .icon {
    font-size: 2rem;
    display: block;
    margin-bottom: 12px;
    position: relative;
  }

  .quote-banner p {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.2rem;
    font-style: italic;
    color: rgba(255,255,255,0.92);
    line-height: 1.8;
    position: relative;
    margin: 0;
    text-shadow: 0 1px 6px rgba(0,0,0,0.1);
  }

  /* CONTENT CARDS */
  .about-card {
    background: var(--white);
    border-radius: 6px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 4px 20px rgba(160,90,98,0.07);
    padding: 36px 40px;
    margin-bottom: 24px;
    animation: fadeUp .8s ease both;
    transition: box-shadow .3s;
  }

  .about-card:hover {
    box-shadow: 0 8px 32px rgba(160,90,98,0.13);
  }

  .about-card .card-icon {
    font-size: 1.8rem;
    margin-bottom: 14px;
    display: block;
  }

  .about-card h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--rose-dark);
    margin-bottom: 14px;
    letter-spacing: 0.03em;
  }

  .about-card p {
    font-size: 0.9rem;
    color: var(--text-mid);
    line-height: 1.85;
    margin: 0;
    text-align: justify;
  }

  /* STATS ROW */
  .stats-row {
    margin-top: 40px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    animation: fadeUp .9s ease both;
  }

  .stat-item {
    flex: 1;
    min-width: 130px;
    background: var(--white);
    border-radius: 6px;
    border: 1px solid rgba(201,132,138,0.12);
    box-shadow: 0 4px 16px rgba(160,90,98,0.07);
    padding: 28px 20px;
    text-align: center;
    transition: transform .3s, box-shadow .3s;
  }

  .stat-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 28px rgba(160,90,98,0.13);
  }

  .stat-item .stat-num {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    font-weight: 600;
    color: var(--rose-dark);
    line-height: 1;
    margin-bottom: 6px;
  }

  .stat-item .stat-label {
    font-size: 0.72rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--text-soft);
    font-weight: 400;
  }

  .stat-divider {
    width: 30px;
    height: 2px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    margin: 8px auto;
    border-radius: 2px;
  }

  @keyframes fadeUp {
    from { opacity:0; transform:translateY(20px); }
    to   { opacity:1; transform:translateY(0); }
  }
</style>

<div class="about-section">
  <div class="container">

    <!-- HEADER -->
    <div class="about-header">
      <h2>Tentang Kami</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Mengenal lebih dekat HIMASI-CAKE BAKERY</p>
    </div>

    <!-- QUOTE BANNER -->
    <div class="quote-banner">
      <div class="deco-circle"></div>
      <div class="deco-circle"></div>
      <span class="icon">🎂</span>
      <p>Himasi Cake &amp; Bakery adalah salah satu pelopor pertama dalam bisnis roti modern di Indonesia. Didirikan pada tahun 1978, saat ini dikelola di bawah PT. Mustika Citra Rasa. Produk kami sehat, bergizi, dan terjangkau oleh semua orang.</p>
    </div>

    <!-- CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <div class="about-card">
          <span class="card-icon">🏪</span>
          <h4>Jaringan Kami</h4>
          <p>Himasi Cake &amp; Bakery adalah rantai toko roti Indonesia terkemuka dengan 22 cabang (dapur pusat) yang mengelola lebih dari 400 outlet: Jabodetabek (Gajah Mada, Pondok Pinang, Jatinegara, Cikini, Sunter, Serpong, Ciputat, Pekayon, Bogor dan Karawang), Bandung, Surabaya, Lampung, Batam, Pekanbaru, Makassar, Manado, Bali, Solo, Semarang, Balikpapan, dan Samarinda. Kami masih terus memperluas secara nasional ke kota-kota lain.</p>
        </div>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-item">
        <div class="stat-num">1978</div>
        <div class="stat-divider"></div>
        <div class="stat-label">Tahun Berdiri</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">22</div>
        <div class="stat-divider"></div>
        <div class="stat-label">Dapur Pusat</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">400+</div>
        <div class="stat-divider"></div>
        <div class="stat-label">Outlet</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">17</div>
        <div class="stat-divider"></div>
        <div class="stat-label">Kota di Indonesia</div>
      </div>
    </div>

  </div>
</div>

<?php 
	include 'footer.php';
?>