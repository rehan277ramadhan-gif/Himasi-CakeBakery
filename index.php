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

  /* FIX SCROLLBAR HORIZONTAL */
  html, body {
    overflow-x: hidden;
    max-width: 100%;
  }
  * { box-sizing: border-box; }

  body { font-family:'Jost',sans-serif; background:var(--cream); margin:0; padding:0; }
  .navbar-custom { position: relative; z-index: 1050; }

  /* ── HERO ── */
  .hero-wrap {
    position: relative;
    width: 100%;
    margin-top: 0;
    overflow: hidden;
    z-index: 1;
  }
  .hero-wrap img {
    width: 100%; height: 650px;
    object-fit: cover; display: block;
    filter: brightness(0.78);
    transition: transform 8s ease;
  }
  .hero-wrap:hover img { transform: scale(1.03); }
  .hero-overlay {
    position: absolute; inset: 0;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    text-align: center; padding: 20px;
    background: linear-gradient(to bottom, rgba(58,30,32,0.15) 0%, rgba(58,30,32,0.52) 100%);
    z-index: 1;
  }
  .hero-overlay h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 4rem; font-weight: 600; color: #fff;
    letter-spacing: 0.06em;
    text-shadow: 0 4px 24px rgba(0,0,0,0.35);
    margin-bottom: 12px;
    animation: fadeDown .9s ease both;
  }
  .hero-overlay p {
    font-size: 0.85rem; letter-spacing: 0.22em;
    text-transform: uppercase; color: rgba(255,255,255,0.85);
    font-weight: 300;
    animation: fadeDown 1.1s ease both;
  }
  .hero-divider {
    width: 60px; height: 1px;
    background: linear-gradient(90deg, transparent, #e8d5b0, transparent);
    margin: 16px auto;
  }
  .hero-cta {
    margin-top: 28px;
    display: flex; gap: 14px; justify-content: center;
    flex-wrap: wrap;
    animation: fadeDown 1.3s ease both;
  }
  .hero-cta a {
    padding: 12px 32px;
    border-radius: 30px;
    font-family: 'Jost', sans-serif;
    font-size: 0.8rem; font-weight: 500;
    letter-spacing: 0.15em; text-transform: uppercase;
    text-decoration: none; transition: all .25s;
    display: inline-block;
  }
  .hero-btn-primary {
    background: linear-gradient(135deg, var(--rose), var(--rose-dark));
    color: #fff !important;
    box-shadow: 0 6px 20px rgba(160,90,98,0.4);
  }
  .hero-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(160,90,98,0.5); opacity:.93; }
  .hero-btn-outline {
    background: transparent;
    color: #fff !important;
    border: 1.5px solid rgba(255,255,255,0.7);
  }
  .hero-btn-outline:hover { background: rgba(255,255,255,0.12); transform: translateY(-2px); }

  /* Hero responsif */
  @media (max-width: 768px) {
    .hero-wrap img { height: 380px; }
    .hero-overlay h1 { font-size: 2.2rem; }
  }

  /* ── TAGLINE ── */
  .tagline-section {
    padding: 55px 0 48px;
    background: #fff;
    border-top: 3px solid var(--rose-light);
    border-bottom: 3px solid var(--rose-light);
  }
  .tagline-icon { text-align:center; font-size:2rem; margin-bottom:16px; animation:float 4s ease-in-out infinite; display:block; }
  .tagline-section h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.6rem; font-weight: 600;
    color: var(--rose-dark); text-align: center;
    margin-bottom: 14px; letter-spacing: 0.04em;
  }
  .tagline-section p {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.1rem; font-style: italic;
    color: var(--text-mid); text-align: center;
    line-height: 1.9; max-width: 720px; margin: 0 auto;
    padding: 0 15px;
  }
  .tagline-stats {
    display: flex; justify-content: center; gap: 50px;
    margin-top: 36px; flex-wrap: wrap;
    padding: 0 15px;
  }
  .stat-item { text-align: center; }
  .stat-item .stat-num {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem; font-weight: 600; color: var(--rose-dark);
    display: block; line-height: 1;
  }
  .stat-item .stat-label {
    font-size: 0.72rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-soft);
    margin-top: 5px; display: block;
  }

  /* ── PRODUK ── */
  .produk-section { padding: 65px 0 80px; background: var(--cream); }
  .produk-header { margin-bottom: 42px; }
  .produk-header h2 {
    font-family:'Cormorant Garamond',serif;
    font-size:2.4rem; font-weight:600;
    color:var(--text-dark); letter-spacing:0.02em; margin-bottom:6px;
  }
  .header-line { display:flex; align-items:center; gap:12px; margin-top:8px; margin-bottom:10px; }
  .line-rose { width:60px; height:3px; background:linear-gradient(90deg,var(--rose),var(--rose-light)); border-radius:2px; }
  .line-gold { width:30px; height:3px; background:linear-gradient(90deg,var(--gold),var(--gold-light)); border-radius:2px; }
  .produk-header .sub { font-size:0.75rem; letter-spacing:0.15em; text-transform:uppercase; color:var(--text-soft); font-weight:300; }

  /* CARD */
  .produk-card {
    background:#fff; border-radius:8px; overflow:hidden;
    box-shadow:0 4px 20px rgba(160,90,98,0.08);
    transition:transform .3s,box-shadow .3s;
    margin-bottom:28px;
    border:1px solid rgba(201,132,138,0.1);
    animation:fadeUp .6s ease both;
    display:flex; flex-direction:column; height:100%;
  }
  .produk-card:hover { transform:translateY(-6px); box-shadow:0 14px 38px rgba(160,90,98,0.16); }
  .card-img-wrap { overflow:hidden; position:relative; flex-shrink:0; }
  .card-img-wrap::after {
    content:''; position:absolute; inset:0;
    background:linear-gradient(to top,rgba(160,90,98,0.18) 0%,transparent 60%);
    pointer-events:none;
  }
  .card-img { width:100%; height:220px; object-fit:cover; display:block; transition:transform .4s; }
  .produk-card:hover .card-img { transform:scale(1.05); }
  .card-body { padding:20px 22px 22px; display:flex; flex-direction:column; flex:1; }
  .card-name {
    font-family:'Cormorant Garamond',serif;
    font-size:1.3rem; font-weight:600;
    color:var(--text-dark); margin-bottom:8px;
  }
  .card-price {
    font-size:1.15rem; font-weight:600;
    color:var(--rose-dark); margin-bottom:16px;
    display:flex; align-items:baseline; gap:3px;
  }
  .card-price .rp { font-size:0.78rem; font-weight:400; color:var(--text-soft); }
  .divider-card { width:100%; height:1px; background:rgba(201,132,138,0.12); margin-bottom:16px; }
  .card-btn-group { display:flex; gap:10px; margin-top:auto; }
  .btn-detail {
    flex:1; padding:10px 12px;
    background:transparent; color:var(--rose-dark);
    border:1px solid var(--rose-light); border-radius:4px;
    font-family:'Jost',sans-serif; font-size:0.75rem;
    font-weight:500; letter-spacing:0.12em; text-transform:uppercase;
    text-align:center; text-decoration:none; transition:background .25s; display:block;
  }
  .btn-detail:hover { background:rgba(201,132,138,0.08); border-color:var(--rose); color:var(--rose-dark); text-decoration:none; }
  .btn-tambah {
    flex:1; padding:10px 12px;
    background:linear-gradient(135deg,var(--rose) 0%,var(--rose-dark) 100%);
    color:#fff; border:none; border-radius:4px;
    font-family:'Jost',sans-serif; font-size:0.75rem;
    font-weight:500; letter-spacing:0.12em; text-transform:uppercase;
    text-align:center; text-decoration:none;
    transition:opacity .25s,transform .2s;
    box-shadow:0 4px 14px rgba(160,90,98,0.25); display:block;
  }
  .btn-tambah:hover { opacity:0.9; transform:translateY(-1px); color:#fff; text-decoration:none; }
  .btn-tambah .glyphicon { margin-right:4px; }

  /* GRID PRODUK */
  .produk-row { display:flex; flex-wrap:wrap; margin:0 -14px; }
  .produk-col { padding:0 14px; margin-bottom:28px; width:33.333%; }

  @media (max-width: 768px) {
    .produk-col { width: 50%; }
    .card-img { height: 160px; }
    .card-body { padding: 12px 14px 14px; }
    .card-name { font-size: 1rem; }
    .card-price { font-size: 0.95rem; margin-bottom: 10px; }
    .btn-detail, .btn-tambah { font-size: 0.68rem; padding: 8px 6px; letter-spacing: 0.06em; }
  }

  @media (max-width: 400px) {
    .produk-col { width: 100%; }
  }

  @media (max-width: 768px) {
  .produk-row { margin: 0 -8px !important; }
  .produk-col {
    width: 50% !important;
    float: left !important;
    padding: 0 8px !important;
    margin-bottom: 16px !important;
  }
  .card-img { height: 160px !important; }
  .card-body { padding: 12px !important; }
  .card-name { font-size: 0.95rem !important; }
  .card-price { font-size: 0.9rem !important; margin-bottom: 8px !important; }
  .btn-detail, .btn-tambah { font-size: 0.68rem !important; padding: 8px 4px !important; }
}

  .btn-lihat-semua {
    display:inline-block; margin-top:16px;
    padding:13px 40px; border-radius:30px;
    background:transparent; color:var(--rose-dark);
    border:1.5px solid var(--rose);
    font-family:'Jost',sans-serif; font-size:0.8rem;
    font-weight:500; letter-spacing:0.15em; text-transform:uppercase;
    text-decoration:none; transition:all .25s;
  }
  .btn-lihat-semua:hover {
    background:var(--rose-dark); color:#fff;
    text-decoration:none; transform:translateY(-2px);
    box-shadow:0 8px 22px rgba(160,90,98,0.25);
  }

  @keyframes fadeDown { from{opacity:0;transform:translateY(-20px)} to{opacity:1;transform:translateY(0)} }
  @keyframes fadeUp   { from{opacity:0;transform:translateY(20px)}  to{opacity:1;transform:translateY(0)} }
  @keyframes float    { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-7px)} }
</style>

<!-- HERO -->
<div class="hero-wrap">
  <img src="image/home/1.jpg" alt="Himasi Cake Bakery">
  <div class="hero-overlay">
    <h1>HIMASI-CAKE BAKERY</h1>
    <div class="hero-divider"></div>
    <p>Crafted with love &amp; passion since 1978</p>
    <div class="hero-cta">
      <a href="produk.php" class="hero-btn-primary">Lihat Produk</a>
      <a href="about.php" class="hero-btn-outline">Tentang Kami</a>
    </div>
  </div>
</div>

<!-- TAGLINE -->
<div class="tagline-section">
  <div class="container">
    <span class="tagline-icon">🎂</span>
    <h4>Selamat Datang di Himasi-Cake Bakery</h4>
    <p>Himasi Cake &amp; Bakery adalah salah satu pelopor pertama dalam bisnis roti modern di Indonesia. Didirikan pada tahun 1978, saat ini dikelola di bawah PT. Mustika Citra Rasa. Produk kami sehat, bergizi, dan terjangkau oleh semua orang.</p>
    <div class="tagline-stats">
      <div class="stat-item">
        <span class="stat-num">1978</span>
        <span class="stat-label">Berdiri Sejak</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">45+</span>
        <span class="stat-label">Tahun Pengalaman</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">100%</span>
        <span class="stat-label">Bahan Berkualitas</span>
      </div>
      <div class="stat-item">
        <span class="stat-num">★ 4.9</span>
        <span class="stat-label">Rating Pelanggan</span>
      </div>
    </div>
  </div>
</div>

<!-- PRODUK -->
<div class="produk-section">
  <div class="container">
    <div class="produk-header">
      <h2>Produk Kami</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Pilihan kue &amp; bakery terbaik untuk Anda</p>
    </div>

    <div class="produk-row">
      <?php 
      $result = mysqli_query($conn, "SELECT * FROM produk");
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="produk-col" style="width:50%; float:left; padding:0 14px;">
          <div class="produk-card">
            <div class="card-img-wrap">
              <img src="image/produk/<?= $row['image']; ?>" class="card-img" alt="<?= htmlspecialchars($row['nama']); ?>">
            </div>
            <div class="card-body">
              <div class="card-name"><?= htmlspecialchars($row['nama']); ?></div>
              <div class="card-price">
                <span class="rp">Rp</span><?= number_format($row['harga'], 0, ',', '.'); ?>
              </div>
              <div class="divider-card"></div>
              <div class="card-btn-group">
                <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn-detail">Detail</a>
                <?php if(isset($_SESSION['kd_cs'])){ ?>
                  <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn-tambah">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                  </a>
                <?php } else { ?>
                  <a href="keranjang.php" class="btn-tambah">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Tambah
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div style="text-align:center; margin-top:10px;">
      <a href="produk.php" class="btn-lihat-semua">Lihat Semua Produk</a>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>