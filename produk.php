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

  * { box-sizing: border-box; }

  .produk-section {
    padding: 50px 0 80px;
    background: var(--cream);
    font-family: 'Jost', sans-serif;
  }

  .produk-header { margin-bottom: 40px; }

  .produk-header h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem; font-weight: 600;
    color: var(--text-dark); letter-spacing: 0.02em; margin-bottom: 6px;
  }

  .produk-header .header-line {
    display: flex; align-items: center; gap: 12px; margin-top: 8px;
  }

  .produk-header .line-rose {
    width: 60px; height: 3px;
    background: linear-gradient(90deg, var(--rose), var(--rose-light));
    border-radius: 2px;
  }

  .produk-header .line-gold {
    width: 30px; height: 3px;
    background: linear-gradient(90deg, var(--gold), var(--gold-light));
    border-radius: 2px;
  }

  .produk-header .sub {
    font-size: 0.75rem; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--text-soft);
    font-weight: 300; margin-top: 8px;
  }

  /* CARD */
  .produk-card {
    background: var(--white); border-radius: 6px; overflow: hidden;
    box-shadow: 0 4px 20px rgba(160,90,98,0.08);
    transition: transform .3s, box-shadow .3s;
    margin-bottom: 28px;
    border: 1px solid rgba(201,132,138,0.1);
    animation: fadeUp .6s ease both;
    height: 100%;
    display: flex; flex-direction: column;
  }

  .produk-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 36px rgba(160,90,98,0.15);
  }

  .produk-card .card-img {
    width: 100%; height: 220px;
    object-fit: cover; display: block;
    transition: transform .4s;
  }

  .produk-card:hover .card-img { transform: scale(1.04); }

  .produk-card .card-img-wrap {
    overflow: hidden; position: relative; flex-shrink: 0;
  }

  .produk-card .card-img-wrap::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(160,90,98,0.18) 0%, transparent 60%);
    pointer-events: none;
  }

  .produk-card .card-body {
    padding: 20px 22px 22px;
    display: flex; flex-direction: column; flex: 1;
  }

  .produk-card .card-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.25rem; font-weight: 600;
    color: var(--text-dark); margin-bottom: 4px; letter-spacing: 0.02em;
  }

  .produk-card .card-price {
    font-size: 1rem; font-weight: 500;
    color: var(--rose-dark); margin-bottom: 16px; letter-spacing: 0.03em;
  }

  .produk-card .card-price span {
    font-size: 0.7rem; font-weight: 300;
    color: var(--text-soft); letter-spacing: 0.08em; margin-right: 2px;
  }

  .divider-card {
    width: 100%; height: 1px;
    background: rgba(201,132,138,0.12); margin-bottom: 16px;
  }

  .card-btn-group { display: flex; gap: 10px; margin-top: auto; }

  .btn-detail {
    flex: 1; padding: 10px 12px;
    background: transparent; color: var(--rose-dark);
    border: 1px solid var(--rose-light); border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.75rem;
    font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
    text-align: center; text-decoration: none;
    transition: background .25s, border-color .25s; display: block;
  }

  .btn-detail:hover {
    background: rgba(201,132,138,0.08); border-color: var(--rose);
    color: var(--rose-dark); text-decoration: none;
  }

  .btn-tambah {
    flex: 1; padding: 10px 12px;
    background: linear-gradient(135deg, var(--rose) 0%, var(--rose-dark) 100%);
    color: var(--white); border: none; border-radius: 4px;
    font-family: 'Jost', sans-serif; font-size: 0.75rem;
    font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
    text-align: center; text-decoration: none;
    transition: opacity .25s, transform .2s;
    box-shadow: 0 4px 14px rgba(160,90,98,0.25); display: block;
  }

  .btn-tambah:hover {
    opacity: 0.9; transform: translateY(-1px);
    color: var(--white); text-decoration: none;
  }

  .btn-tambah .glyphicon { margin-right: 4px; font-size: 0.8rem; }

  /* Empty state */
  .empty-state { text-align: center; padding: 80px 20px; color: var(--text-soft); }
  .empty-state .icon { font-size: 3rem; margin-bottom: 16px; }
  .empty-state p { font-size: 0.9rem; letter-spacing: 0.05em; }

  @keyframes fadeUp {
    from { opacity:0; transform: translateY(20px); }
    to   { opacity:1; transform: translateY(0); }
  }

  /* RESPONSIF */
  @media (max-width: 768px) {
    .produk-section { padding: 30px 0 60px; }
    .produk-header h2 { font-size: 1.6rem; }

    /* 2 kolom di HP */
    .col-sm-6 { padding-left: 8px; padding-right: 8px; }
    .row { margin-left: -8px; margin-right: -8px; }

    .produk-card .card-img { height: 160px; }
    .produk-card .card-body { padding: 12px 14px 14px; }
    .produk-card .card-name { font-size: 1rem; }
    .produk-card .card-price { font-size: 0.9rem; margin-bottom: 10px; }
    .btn-detail, .btn-tambah { font-size: 0.68rem; padding: 8px 6px; letter-spacing: 0.05em; }
    .btn-tambah .glyphicon { display: none; }
  }

  @media (max-width: 400px) {
    .col-sm-6 { width: 100%; }
  }
</style>

<div class="produk-section">
  <div class="container">

    <div class="produk-header">
      <h2>Produk Kami</h2>
      <div class="header-line">
        <div class="line-rose"></div>
        <div class="line-gold"></div>
      </div>
      <p class="sub">Pilihan kue & bakery terbaik untuk Anda</p>
    </div>

    <div class="row">
      <?php 
      $result = mysqli_query($conn, "SELECT * FROM produk");
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-xs-6 col-sm-6 col-md-4" style="width:50%; float:left; padding:0 8px;">
          <div class="produk-card">
            <div class="card-img-wrap">
              <img src="image/produk/<?= $row['image']; ?>" class="card-img" alt="<?= htmlspecialchars($row['nama']); ?>">
            </div>
            <div class="card-body">
              <div class="card-name"><?= htmlspecialchars($row['nama']); ?></div>
              <div class="card-price"><span>Rp</span><?= number_format($row['harga']); ?></div>
              <div class="divider-card"></div>
              <div class="card-btn-group">
                <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn-detail">Detail</a>
                <?php if(isset($_SESSION['kd_cs'])){ ?>
                  <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=2" class="btn-tambah"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                <?php } else { ?>
                  <a href="keranjang.php" class="btn-tambah"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php 
        }
      } else {
      ?>
        <div class="col-md-12">
          <div class="empty-state">
            <div class="icon">🎂</div>
            <p>Belum ada produk tersedia saat ini.</p>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
</div>

<?php include 'footer.php'; ?>